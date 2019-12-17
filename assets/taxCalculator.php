<?php
namespace MPloyEZ;

use Exception;

/**
 * The tax caculator.
 */
class TaxCalculator {
	
	/**
	 * Loads a file and attempt to assign the values to the taxBrackets property
	 * @param string $url The URL we are trying to load tax data from
	 */
	 function __construct(string $url){
		try {
			$this->LoadTaxData($url);
		} catch (MPEZException $ex){
			throw $ex;
		}
    }

	public $taxBrackets = [];

	/**
	 * Gets the tax data for the calculator as adds them to the tax brackets array.
	 */
    public function LoadTaxData(string $url){
    	$rawData = json_decode(file_get_contents($url), true);
		
		// If theres no tax data available, throw an exeption.
		// This exception will be caught and bubbled to the calling function. 
		if(count($rawData) < 1){
			 throw new TaxCalculatorException("Tax JSON contains no elements");
		}

		// Loop through the array we've found and try to create a tax bracket object for each
		foreach ($rawData as $rawBracket){
			try {
				// Create the tax bracket object
				$bracket = new TaxBracket($rawBracket);

				// Add the bracket to the taxBracket array
				array_push($this->taxBrackets, $bracket);

			} catch(TaxBracketException $ex){
				throw $ex;
			}
		}

		// Sort the tax brackets by ID descending
		usort($this->taxBrackets, function(TaxBracket $item1, TaxBracket $item2){

			// the spaceship operators are used in usort to ensure correct sorting of arrays
			// https://wiki.php.net/rfc/combined-comparison-operator
			return $item2->id <=> $item1->id;
		});
	}
	
	/**
	 * Calculates the tax for the employee, taking into account any exceptions
	 * established
	 */
	public function CalculateTaxForEmployee(Employee $employee){
		// check the if there are any exceptions.
		$taxed = 0.00;
		$salary = $employee->salary;
		foreach ($this->taxBrackets as $bracket){
			
			$this->CalculateTaxFromSalary($taxed, $salary, $bracket, $employee->getcompanycar(), $salary > $this->taxBrackets[0]->minSalary);
		}
		$taxed = number_format(round($taxed, 3, PHP_ROUND_HALF_EVEN) ,2, ".", "");
		return array("salary"=>$salary, "taxed"=> $taxed, "takeHomePay"=>number_format($salary-$taxed, 2, ".", ""));
	}

	/**
	 * Calculates the tax from the salary.
	 */
	public function CalculateTaxFromSalary(float &$taxed, float $salary, TaxBracket $bracket, bool $companycar, bool $supertax){
		$rate = $bracket->rate;

		if (count($bracket->exceptions) > 0){
			if ($companycar || $supertax){
			// set the variable to use when reducing the amount that is tax free.
			$reduced = 0;
			if (isset($bracket->exceptions["Super tax"]) && $supertax){
				// set the super tax tax free reduction as a float for multiplying the salary.
				$reduced = $bracket->exceptions["Super tax"] / 100;
			}
			if (isset($bracket->exceptions["Company car"]) && $companycar){
				// set the company car tax free reduction as a float for multiplying the salary.
				$reduced = $bracket->exceptions["Company car"] / 100;
			}
			$exceptionTax = 0;
			// use the rate of the next bracket.
			$rate = array_values(array_filter($this->taxBrackets, function($nextBracket) use($bracket){
				return $nextBracket->id == $bracket->id + 1;
			}))[0]->rate;
			
			// if the salary falls within this bracket, tax the difference between the salary and min salary.
			// if the salary is greater than this bracket, use the maxSalary.
			if ($salary <= $bracket->maxSalary && $salary >= $bracket->minSalary){
				$exceptionTax = (($salary - $bracket->minSalary) * $reduced) * ($rate / 100);
			} else if ($salary > $bracket->maxSalary){
				$exceptionTax = (($bracket->maxSalary - $bracket->minSalary) * $reduced) * ($rate / 100);
			} else {
				return;
			}
			$taxed += $exceptionTax;
		}

		}

		// if the salary is lower than the bracket minSalary, do not tax for this band.
		// go to the next band.
		if ($salary < $bracket->minSalary){
			return;
		}

		// If the salary falls between the bounds, 
		// tax the difference between the minSalary for the bracket and the actual salary
		if ($salary >= $bracket->minSalary && $salary <= $bracket->maxSalary){
			$taxed += ($salary - $bracket->minSalary) * (float)($rate / 100);
			return;
		}

		// if the salary is greater than the maxSalary, tax the standard amount
		if ($salary > $bracket->maxSalary){
			$taxed += ($bracket->maxSalary - $bracket->minSalary) * ($rate / 100);
			return;
		}
	}
}




?>