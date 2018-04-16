<?php
require 'sections/header.php';
require './connect/connect.php';
require './login-function.php';
?>

<div class="loginContainer">
    <div class="loginBox">
        <div class="loginTextContainer">
            <h2 class="loginText">Logga in</h2>
            <p class="loginNotUser">Har du inget konto kan du registrera dig <a href="signup.php">här</a></p>
        </div>
        <form method="POST" class="loginForm" action="./login.php">
            <input type="text" class="inputLogin" placeholder="Email" name="userName" id="inputLoginUser"/>
            <input type="password" class="inputLogin" placeholder="Lösenord" name="userPass"/>
            <input type="submit" name="submitLogin"/>
        </form>
    </div>
</div>

