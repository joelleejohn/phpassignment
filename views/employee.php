<?php
require 'vendor/autoload.php';
use MPloyEZ\Employee;
$jsonData = $_SESSION['employees'];
$employee = new Employee($this->data['id'], $jsonData);

$this->layout('default', ['title' => 'Employee -'. $employee->fullname]); 

?>

<div class="profile-grid">
    <overview>
        <div class="card">
            <h1><?=$employee->fullname?></h1>
            <img id="employeeImg" src="<?=$employee->getprofilepictureuri()?>">
        </div>
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
        <form id="calculator" onsubmit="reCalculateTax()" method="post">
        <fieldset>
            <legend>Tax Calculator</legend>
            <input type="text" name="salary" id="salary" value="<?=$employee->salary?>">
            <input id="employeeID" type="text" name="id" value="<?=$employee->id?>" hidden>
        </fieldset>
        </form>

        <form id="upload" onsubmit="uploadImage()" method="">
        <fieldset>
            <legend>Profile Image Upload</legend>
            <input type="file" name="profileUpload" id="profileUpload">
            <input id="employeeID" type="text" name="employeeID" value="<?=$employee->id?>" hidden>
            <button id="confirmUpload">Upload</button>
        </fieldset>
        </form>
    </content>
</div>