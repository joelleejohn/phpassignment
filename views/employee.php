<?php
require 'vendor/autoload.php';
use MPloyEZ\Employee;

function clog($print){
    echo '<script>';
    echo 'console.log('.$print.')';
    echo '</script>';
}
$jsonData = json_decode(file_get_contents('data/employees-final.json'));
$employee = new Employee($this->data['id'], $jsonData);

$this->layout('default', ['title' => 'Employee -'. $employee->fullname]); 

?>

<!-- Simply echo the employee's first name. Do whatever else you want to after this point.
the syntax used here is a shortcut for < ?php echo $employee->firstname?> -->

<div class="profile-grid">
    <overview>
        <h1><?=$employee->fullname?></h1>
        <info> Information
            <slice class="details" id="main-details">
                <snippet>Job Title: <span><?=$employee->jobtitle?></span></snippet>
                <snippet>Email Address: <span><?=$employee->email?></span></snippet>
            </slice>
            <slice class="details collapsible" id="extra-details">
                <snippet>Department: <span><?=$employee->department?></span></snippet>
                <snippet>D.O.B: <span><?=$employee->dob?></span></snippet>
            </slice>
        </info>
    </overview>

</div>