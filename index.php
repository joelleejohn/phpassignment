<?php
require 'vendor/autoload.php';

$engine = new League\Plates\Engine('templates/');

echo $engine->render('startup');
?>