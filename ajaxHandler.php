<?php
    $response = array();
    for($index = 0; $index < $_POST["numberoftickets"]; $index++){
        $formField = "<br><label for\"field{$index}\">Enter Name</label><br><input type=\"text\"id=\"f{$index}\" name=\"field{$index}\"><br><br>";
        array_push($response, $formField);
    }
    array_push($response, "<input type=\"button\" value=\"Confirm Names\">");

    echo json_encode($response);
?>