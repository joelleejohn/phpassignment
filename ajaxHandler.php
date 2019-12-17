<?php
namespace MPloyEZ;
require 'vendor/autoload.php';
$employee = Employee::getEmployeeFromId($_GET['id']);
$response = array();
$calculator = new TaxCalculator('./data/tax-tables.json');

array_push($response, $calculator->CalculateTaxForEmployee($employee));
array_push($response, print_r($calculator->taxBrackets[3]->exceptions));

echo json_encode($response);
?>