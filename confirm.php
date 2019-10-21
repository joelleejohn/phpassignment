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
<?php
$goodNames = array();
$error = FALSE;
$numToAdd = 0;
foreach ($_POST as $key=>$val){
    if (strpos($key, "f") === 0){
        if (strlen($val) > 0){
            array_push($goodNames, $val);
        } else {
            $error = TRUE;
            $numToAdd++;
        }
    }
}

if (count($goodNames) > 0){
    isset($_SESSION["goodNames"]) ? $_SESSION["goodNames"] = array_merge($_SESSION["goodNames"], $goodNames) : $_SESSION["goodNames"] = $goodNames;
}

if($error){
    echo "<p>One or more names were not entered, please try again</p>";
    echo "<form action=\"submit.php\" method=\"post\">";
    foreach ($_SESSION["goodNames"] as $name){
        echo "<p>{$name} is valid</p><br><br>";
    }
    echo "  <input type=\"hidden\" name=\"numberoftickets\" value=\"{$_POST["numberoftickets"]}\"><br>";
    echo "  <input type=\"hidden\" name=\"hasErrored\" value=\"1\"><br>";
    echo "  <input type=\"hidden\" name=\"numToAdd\" value=\"{$numToAdd}\"><br>";
    echo "  <input type=\"submit\" value=\"Go Back\"><br>";
    echo "</form>";
} else {
    echo "<p>Thank you for your purchase</p>";
    foreach($_SESSION["goodNames"] as $name){
        $randNum = mt_rand(100, 200);
        echo "<p>{$name}'s order number is: {$randNum}</p><br>";
    }

    unset($_SESSION["goodNames"]);
}
?>

</body>
</html>
