<?php
require 'vendor/autoload.php';
$engine = new League\Plates\Engine('views/');
$req;

if (isset($_GET['url']))
{
    $req = explode('/', $_GET['url']);
} else {
    $req = ['/'];
}

function handleEmployee(int $id,string ...$args)
{
    global $engine;

    // need to handle changing employee picture
    if (count($args) >= 1){
        return $engine->render('pictureChange');
    }

    return $engine->render('employee', ['id' => $id]);
}

function authenticateAndRender(string $page)
{
    global $engine;
    
    if (isset($_SESSION['user'])){
        echo $engine->render($page);
    } else if(isset($_POST['username']) && isset($_POST['username'])){
        // Set User from users.json
        $registeredUsers = json_decode(file_get_contents('data/users.json'), true);

        $_SESSION['user'] = array_filter($registeredUsers, function($item){
            return $item['username'] == $_POST['username'] && $item['password'] == $_POST['password'];
        })[0];
        
        echo $engine->render('startup');
    } else {
        echo $engine->render('login');
    }
}

switch ($req[0]){
    case '/' :
    case '' :
        echo authenticateAndRender('startup');
        break;
    case 'employee':
        echo handleEmployee((int)$req[1]);
        break;
    default:
        print_r($req);
        break;
}
?>