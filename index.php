<?php
session_start();
require 'vendor/autoload.php';
$engine = new League\Plates\Engine('views/');
$req;

if (isset($_GET['url']))
{
    $req = explode('/', $_GET['url']);
} else {
    $req = ['/'];
}

function authenticateAndRender(string $page, ...$args)
{
    global $engine;

    if ($page == 'login'){
        echo $engine->render($page, $args[0]);
        return;
    }

    if (isset($_SESSION['user'])){
        if (count($args) > 0){
            echo $engine->render($page, $args[0]);
        }
        else{
            echo $engine->render($page);
        }
    } else if(isset($_POST['username']) && isset($_POST['username'])){
        // Set User from users.json
        $registeredUsers = json_decode(file_get_contents('data/users.json'), true);

        $unverifiedUser = array_values(array_filter($registeredUsers, function($item){
            return $item['username'] == $_POST['username'] && $item['password'] == $_POST['password'];
        }));

        if (count($unverifiedUser) == 1){
            $_SESSION['user'] = $unverifiedUser[0];

            if (count($args) > 0){
                echo $engine->render($page, $args);
            } else {
                echo $engine->render($page);
            }
        } else {
           // if we've not found one verified user for these details, redirect to the login page
           // and display the failed login message
            echo $engine->render('login', ['failedLogin' => true]);
        }
    } else {
        echo $engine->render('login', ['failedLogin' => false]);
    }
}

switch ($req[0]){
    case 'employee':
        echo authenticateAndRender('employee', ['id' => (int)$req[1]]);
        break;
    case 'logout':
        session_destroy();
        session_reset();
        header('Location: /');
        break;
    case '/' :
    case '' :
        echo authenticateAndRender('startup');
        break;
    case 'login':
    default:
        echo authenticateAndRender('login', ['failedLogin' => false]);
        break;
}
?>