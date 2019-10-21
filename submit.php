<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
<?php session_start()?>
    <form action="confirm.php" method="post">
    <?php
    if (filter_var($_POST["hasErrored"], FILTER_VALIDATE_BOOLEAN)){
        for ($index = 0; $index < $_POST["numToAdd"]; $index++){
            echo "<input id=\"\"type=\"text\" name=\"f{$index}\"><br>";
        }
    } else {
        for ($index = 0; $index < $_POST["numberoftickets"]; $index++){
            echo "<input id=\"\"type=\"text\" name=\"f{$index}\"><br>";
        }
    }
    ?>
    <input type="submit" value="confirm">
    <input type="hidden" name="numberoftickets" value="{$_POST["numberoftickets"]}">
    </form>
</body>
</html>
