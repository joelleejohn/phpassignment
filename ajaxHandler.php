<?php
    $response = array();
    for($index = 0; $index < $_POST["numberoftickets"]; $index++){
        array_push($response, "<br><input id=\"\"f{$index}\"\"><br><br>");
    }

    echo json_encode($response);
    
?>