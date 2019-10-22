<?php
    $response = array();
    for($index = 0; $index < $_POST["numberoftickets"]; $index++){
        array_push($response, "<input id=\"\"f{$index}\"\">");

        echo json_encode($response);
}


    
?>