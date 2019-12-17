<?php
namespace MPloyEZ;
require 'vendor/autoload.php';
$employee = Employee::getEmployeeFromId($_POST['id']);
$response = array();
$calculator = new TaxCalculator('./data/tax-tables.json');

array_push($response, $calculator->CalculateTaxForEmployee($employee));

echo json_encode($response);
?>