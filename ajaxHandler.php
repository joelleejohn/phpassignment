<?php
namespace MPloyEZ;
require 'vendor/autoload.php';
$salary = $_GET["salary"];
$response = array();
$calculator = new TaxCalculator('./data/tax-tables.json');

array_push($response, $calculator->CalculateTaxForEmployee($salary));
echo json_encode($response);
?>