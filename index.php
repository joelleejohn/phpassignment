<?php
require 'vendor/autoload.php';
$engine = new League\Plates\Engine('views/');
$req;
if (isset($_GET['url'])){
    $req = explode('/', $_GET['url']);
} else {
    $req = ['/'];
}

function handleEmployee($engine, int $id,string ...$args){

    // need to handle changing employee picture
    if (count($args) >= 1){
        return $engine->render('pictureChange');
    }

    return $engine->render('employee', ['id' => $id]);
}

switch ($req[0]){
    case '/' :
        echo $engine->render('startup');
        break;
    case '' :
        echo $engine->render('startup');
        break;
    case 'employee':
        echo handleEmployee($engine, (int)$req[1]);
        break;
    default:
        print_r($req);
        break;
}
?>