<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    <form action="/confirm.php">
    <?php
        for ($index = 0; $index < $_POST["numberoftickets"]; $index++){
            echo "<input type=\"text\">";
        }
    ?>

    </form>
</body>
</html>
