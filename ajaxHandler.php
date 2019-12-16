<?php
namespace MPloyEZ;
require 'vendor/autoload.php';
$salary = $_GET["salary"];
$response = array();
$calculator = new TaxCalculator('./data/tax-tables.json');

array_push($response, $calculator->CalculateTaxForEmployee($salary));
array_push($response, print_r($calculator->taxBrackets[3]->exceptions));

echo json_encode($response);
?>