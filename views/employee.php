<?php
require 'vendor/autoload.php';
use MPloyEZ\Employee;
session_start();
function clog($print){
    echo '<script>';
    echo 'console.log('.$print.')';
    echo '</script>';
}
$jsonData = $_SESSION['employees'];
$employee = new Employee($this->data['id'], $jsonData);

$this->layout('default', ['title' => 'Employee -'. $employee->fullname]); 

?>

<!-- Simply echo the employee's first name. Do whatever else you want to after this point.
the syntax used here is a shortcut for < ?php echo $employee->firstname?> -->

<div class="profile-grid">
    <overview>
        <h1><?=$employee->fullname?></h1>
        <img src="<?=$employee->profilepictureuri?>" alt="" srcset="">
        <info><p>Information</p>
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
    <content>
        <form onsubmit="reCalculateTax()">
        <fieldset>
            <legend>Tax Calculator</legend>
            <input type="text" name="" id="" readonly value="Previous Roles">
        </fieldset>
        </form>
    </content>
</div>