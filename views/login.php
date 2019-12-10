<?php
// Get all of the classes and such that we need.
    require 'vendor/autoload.php';
    $this->layout('default', ['title' => 'Login']); 
?>
<div class="wide-grid centered white">
    <form id="login" action="/" method="post">
    <?php if ($this->data['failedLogin']): ?>
        <p>Login failed, please re-enter your details or contact your system administrator.</p>
    <?php endif; ?>
        <label><p>Username</p><input type="text" name="username" id="username" placeholder="Username"></label>
        <label><p>Password</p><input type="password" name="password" id="password" placeholder="Password"></label>
        <button>Login</button>
    </form>
</div>
