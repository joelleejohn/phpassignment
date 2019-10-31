<?php $this->layout('default', ['title' => 'Employee']); ?>

<?php

# Get all of the employees into an array.
# Because my employee.php file is in a different folder, the path to my json will probably
# be different to yours.
$jsonData = json_decode(file_get_contents('data/employees-final.json'));

# array_values resets the keys of the new array
# so we can simply select the first item
$employee = array_values(array_filter($jsonData,

    # array_filter takes an array, and a callback that will allow us to return
    # a new array of elements that have returned true in our callback. A callback is a term for a function
    function ($value){

        # array_filter loops through every element in the array we pass it ($jsonData)
        # and performs the callback on each element.
        # The callback will add the element to the array if the id of the element we are on
        # is the same as the id that was passed into the user.php?id= (I have renamed this to employee.php)
        return (int)$value->id == (int)$_GET['id'];
    }
))[0]; // The array will only contain one element. So select the first element in the array.
?>

<!-- Simply echo the employee's first name. Do whatever else you want to after this point.
the syntax used here is a shortcut for < ?php echo $employee->firstname?> -->
<h1>Employee Name: <?=$employee->firstname?></h1>