<?php
    require 'vendor/autoload.php';
    $this->layout('default', ['title' => 'Login']); 
?>

<form id="login" action="/" method="post">
    <label><input type="text" name="username" id="username" placeholder="Username"> Username</label>
    <label><input type="password" name="password" id="password" placeholder="Password"> Password</label>
    <button>Login</button>
</form>