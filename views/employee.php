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
        <form id="calculator" onsubmit="recalculateTax()" method="post">
        <fieldset>
            <legend>Tax Calculator</legend>
            <label>Enter a new salary value to calculate tax<input type="number" name="salary" id="salary" value="<?=$employee->salary?>"></label>
            <input id="employeeID" type="text" name="id" value="<?=$employee->id?>" hidden>
            <button id="recalc">Recalculate</button>
            <div id="calculation" >
                <label>Salary: <input type="text" name="profileUpload" id="salaryNew" readonly></label>
                <label>Gross income (annual): <input type="text" name="profileUpload" id="takeHomePayNew" readonly></label>
                <label>Gross income (monthly): <input type="text" name="profileUpload" id="monthlyNew" readonly></label>
                <label>Amount taxed (annual): <input type="text" name="profileUpload" id="taxedNew" readonly></label>
            </div>
        </fieldset>
        </form>

        <form id="upload" onsubmit="uploadImage()" method="">
        <fieldset>
            <legend>Profile Image Upload</legend>
            <label>Chose an image to upload<input type="file" name="profileUpload" id="profileUpload"></label>
            <input id="employeeID" type="text" name="employeeID" value="<?=$employee->id?>" hidden>
            <button id="confirmUpload">Upload</button>
        </fieldset>
        </form>
    </content>
</div>