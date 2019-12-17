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
    public $fullname;
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
    private $profilepictureuri;

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

    public function getprofilepictureuri(): string 
    {
        clearstatcache();
        $path = '../views/images/'.$this->id.'.jpg';
        if (file_exists(__DIR__.'/'.$path)){
            return  $path;
        }
        else {
            return $this->profilepictureuri;
        }
        
    }

    public static function getEmployeeFromId(int $id){
        $jsonData = json_decode(file_get_contents('../data/employees-final.json'));
        return Employee::getEmployeeBase($id, $jsonData);
    }

    public static function getEmployee(int $id, array $jsonData)
    {
        return Employee::getEmployeeBase($id, $jsonData);
    }

    private static function getEmployeeBase($id, array $data){
        return array_values(array_filter($data,
            function ($value) use ($id){
                return (int)$value->id == $id;
            }
        ))[0];
    }

    /**
     * Assigns all the values of the raw employee data to the instantiated employee object.
     * @param object $rawEmployee
     */
    private function assignValues($rawEmployee): void
    {
        $this->id = $rawEmployee->id;
        $this->firstname = $rawEmployee->firstname;
        $this->lastname = $rawEmployee->lastname;
        $this->fullname = $rawEmployee->firstname.' '.$rawEmployee->lastname;
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
        $this->setcompanycar($rawEmployee->companycar);
        $this->profilepictureuri = getenv('APP_ROOT_PATH').'views/images/default.png';
    }


}

?>