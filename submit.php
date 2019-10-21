<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    <form action="confirm.php">
    <?php
    echo "<script>";
    echo "console.log(".$_POST["numberoftickets"].")";
    echo "</script>";
        for ($index = 0; $index < $_POST["numberoftickets"]){

        }
    ?>
    </form>
</body>
</html>
