<?php

use MPloyEZ\Employee;

$this->layout('default', ['title' => 'Employees']);	
?>

<table id="tbl" class="display">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Salary</th>
            <th>Take Home Pay (Annual)</th>
            <th>Take Home Pay (Monthly)</th>
            <th>Taxed (Annual)</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
<?php
// Check if the employees have been loaded, if not load the employees into the session.
if (!isset($_SESSION["employees"])){
    $_SESSION["employees"] = json_decode(file_get_contents('data/employees-final.json'));
}
?>
<?php foreach($_SESSION["employees"] as $data): ?>
    <tr>
        <?php 
            $employee = new Employee($data->id, $_SESSION["employees"]);
            $taxInfo = $employee->GetTakeHomePay();
        ?>
        <td><?=$employee->firstname?></td>
        <td><?=$employee->lastname?></td>
        <td class="<?= $employee->currency=='GBP' ? "formatted-GBP" : 'formatted-USD'?>"><?=$taxInfo['salary']?></td>
        <td class="<?= $employee->currency=='GBP' ? "formatted-GBP" : 'formatted-USD'?>"><?=$taxInfo['takeHomePay']?></td>
        <td class="<?= $employee->currency=='GBP' ? "formatted-GBP" : 'formatted-USD'?>"><?=$taxInfo['monthly']?></td>
        <td class="<?= $employee->currency=='GBP' ? "formatted-GBP" : 'formatted-USD'?> right-aligned"><?=$taxInfo['taxed']?></td>
        <td><a href="/site/employee/<?=$employee->id?>">View Details</a></td>
    </tr>
    

<?php endforeach; ?>
</tbody>
</table>