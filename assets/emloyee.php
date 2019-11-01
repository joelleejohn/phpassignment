<?php
namespace MPloyEZ;

class Employee {

    function __construct(int $id, array &$jsonData)
    {
        $this->assignValues(Employee::getEmployee($id, $jsonData));
    }

    public $id;
    public $firstname;
    public $lastname;
    public $grade;
    public $jobtitle;
    public $nationalinsurance;
    public $photo;
    public $department;
    public $reports = [];
    public $linemanager;
    public $salary;
    public $currency;
    public $phone;
    public $email;
    public $homeemail;
    public $homeaddress;
    public $nextofkin;
    public $employmentstart;
    public $employmentend;
    public $dob;
    public $previousroles = [];
    public $otherroles = [];
    public $pension;
    public $pensiontype;

    // bool
    private $companycar;

    public function setcompanycar(string $value): void
    {
        $this->companycar = $value == 'y';
    }

    public function getcompanycar(): bool
    {
        return $this->companycar;
    }

    public static function getEmployee(int $id, array $jsonData): object
    {
        return array_values(array_filter($jsonData,
            function ($value) use ($id){
                return (int)$value->id == $id;
            }
        ))[0];
    }

    private function assignValues($rawEmployee): void
    {
        $this->id = $rawEmployee->id;
        $this->firstname = $rawEmployee->firstname;
        $this->lastname = $rawEmployee->lastname;
        $this->grade = $rawEmployee->grade;
        $this->jobtitle = $rawEmployee->jobtitle;
        $this->nationalinsurance = $rawEmployee->nationalinsurance;
        $this->photo = $rawEmployee->photo;
        $this->department = $rawEmployee->department;
        $this->reports = $rawEmployee->reports;
        $this->linemanager = $rawEmployee->linemanager;
        $this->salary = $rawEmployee->salary;
        $this->currency = $rawEmployee->currency;
        $this->phone = $rawEmployee->phone;
        $this->email = $rawEmployee->email;
        $this->homeemail = $rawEmployee->homeemail;
        $this->homeaddress = $rawEmployee->homeaddress;
        $this->nextofkin = $rawEmployee->nextofkin;
        $this->employmentstart = $rawEmployee->employmentstart;
        $this->employmentend = $rawEmployee->employmentend;
        $this->dob = $rawEmployee->dob;
        $this->previousroles = $rawEmployee->previousroles;
        $this->otherroles = $rawEmployee->otherroles;
        $this->pension = $rawEmployee->pension;
        $this-> setcompanycar($rawEmployee->pensiontype);
    }


}

?>