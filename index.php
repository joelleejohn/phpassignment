<?php
require 'vendor/autoload.php';
$engine = new League\Plates\Engine('views/');

$fullrequest = $_SERVER['REQUEST_URI'];
$base = '/phpassignment';
$trimmed = str_replace($base, '', $fullrequest);
switch ($trimmed){
    case '/' :
        echo $engine->render('startup');
        break;
    case '' :
        echo $engine->render('startup');
        break;
    default:
        $engine->render('startup');
        break;
}
?>