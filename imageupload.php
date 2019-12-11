<?php 
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $tmpPath = $_FILES['file']['tmp_name'];
        $imageInfo = pathinfo($tmpPath);
        $path = 'views/images/'.$_POST['id'].'.jpg';
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
        $response = array();
        array_push($response, '../'.$path);
        array_push($response, $imageInfo);
        array_push($response, getenv('APP_ROOT_PATH').$path);

        echo json_encode($response);
    }

?>