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
            <section id="main-details">
                <snippet>Job Title: <?=$employee->jobtitle?></h2>
                <h2>Email Address: <?=$employee->email?></h2>
            </section>
            <section id="extra-details">
                <h2>Department: <?=$employee->department?></h2>
                <h2>D.O.B: <?=$employee->dob?></h2>
            </section>
        </info>
    </overview>

</div>