<?php
session_start();
require 'vendor/autoload.php';
$engine = new League\Plates\Engine('views/');
$req;

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

if (isset($_GET['url']))
{
    $req = explode('/', $_GET['url']);
} else {
    $req = ['/'];
}

/**
 * Handles requests related to individual employees
 * @param int $id the ID of the employee we're interacting with
 * @param array $args any arguements after the employee/ string
 * @return string rendered content for the request.
 */
function handleEmployee(int $id, string ...$args)
{
    global $engine;

    return authenticateAndRender('employee', ['id' => $id]);
}

function authenticateAndRender(string $page, ...$args)
{
    global $engine;

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
            echo $engine->render($page, $args[0]);
        } else {
           
            echo $engine->render('login', ['failedLogin' => true]);
        }


    } else {
        echo 'hello';
        echo $engine->render('login', ['failedLogin' => false]);
    }
}

switch ($req[0]){
    case '/' :
    case '' :
        echo authenticateAndRender('startup');
        break;
    case 'employee':
        echo $req[1];
        echo authenticateAndRender('employee', ['id' => (int)$req[1]]);
        break;
    case 'login':
        echo authenticateAndRender('startup');
    default:
        print_r($req);
        break;
}
?>