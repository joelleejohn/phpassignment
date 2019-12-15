<?php
namespace MPloyEZ;

use Exception;

class TaxBracket {
	function __construct(array $rawBracket){
		$this->AssignValues($rawBracket);
	}
	
	public $id;
	public $name;
	public $description;
	public $minSalary;
	public $maxSalary;
	public $rate;
	public $exceptions = [];

	private function AssignValues(array $rawBracket){
		try {
			$this->id = $rawBracket["id"];
			$this->name = $rawBracket["name"];
			$this->description = $rawBracket["description"];
			$this->minSalary = $rawBracket["minsalary"];
			$this->maxSalary = $rawBracket["maxsalary"];
			$this->rate = $rawBracket["rate"];
			$this->exceptions = $rawBracket["exceptions"];
			foreach ($this->exceptions as $key => $ex){
				$this->exceptions[$key] = (array)$ex;
			}
		} catch (Exception $ex){
			$message = "Unable to create a new tax bracket. Exception: ".$ex->getMessage();
			throw new TaxBracketException($message);
		}
	}
				
}
