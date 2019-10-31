<?php $this->layout('default', ['title' => 'Employee'])?>

<?php
$employee = array_filter($_SESSION['employees'],
    function ($value, $key){
        return $value->id == (int)$_GET['id'];
    }
)[0];
?>

<h1><?=$employee->firstname?></h1>