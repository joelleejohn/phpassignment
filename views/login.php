<?php
// Get all of the classes and such that we need.
    require 'vendor/autoload.php';
    $this->layout('default', ['title' => 'Login']);
?>
<div class="wide-grid centered">
    <form id="login" action="/" method="post" class="white">
    <?php if ($this->data['failedLogin']): ?>
        <p>Login failed, please re-enter your details or contact your system administrator.</p>
    <?php endif; ?>
        <label><p>Username</p><input type="text" name="username" id="username" placeholder="Username" autocomplete="off"></label>
        <label><p>Password</p><input type="password" name="password" id="password" placeholder="Password" autocomplete="off"></label>
        <button>Login</button>
    </form>
</div>
