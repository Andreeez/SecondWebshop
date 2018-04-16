<?php
require 'sections/header.php';
require 'connect/connect.php';
require 'signup-function.php';
?>

<div class="loginContainer">
    <div class="loginBox">
        <div class="loginTextContainer">
            <h2 class="loginText">Registrera dig</h2>
            <p class="loginNotUser">Har du redan konto, vänligen logga in<a href="login.php">här</a></p>
        </div>
        
        <form method="POST" class="signIn" action="signup.php">
            <input type="text" class="inputSignUp" placeholder="Förnamn" name="fName"/>
            <input type="text" class="inputSignUp" placeholder="Efternamn" name="lName"/>
            <input type="text" class="inputSignUp" placeholder="Email" name="email" id="inputSignUpUser"/>
            <input type="text" class="inputSignUp" placeholder="Adress" name="adress"/>
            <input type="text" class="inputSignUp" placeholder="postnummer" name="postCode"/>
            <input type="text" class="inputSignUp" placeholder="Stad" name="city"/>
            <input type="text" class="inputSignUp" placeholder="Telefonnummer" name="phone"/>
            
            <input type="password" class="inputSignUp" placeholder="Password" name="newPass"/>
            <input type="password" class="inputSignUp" placeholder="Bekräfta Lösenord" name="confirmPass"/>
            <input type="submit" name="signUpNewUser" value="Registrera dig"/>
        </form>
    </div>
</div>