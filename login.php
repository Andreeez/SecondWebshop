<?php
require 'sections/header.php';
require 'connect/connect.php';
?>

<div class="loginContainer">
    <div class="loginBox">
        <div class="loginTextContainer">
            <h2 class="loginText">Logga in</h2>
            <p class="loginNotUser">Har du inget konto kan du registrera dig <a href="#">här</a></p>
        </div>
        <form method="POST" class="loginForm">
            <input type="text" class="inputLogin" placeholder="E m a i l" name="userName" id="inputLoginUser"/>
            <input type="password" class="inputLogin" placeholder="P a s s w o r d" name="userPass"/>
            <input type="submit" name="submitLogin"/>
        </form>
    </div>
</div>

<?php
function logInUser(){
global $connection; 
session_start();

$userName = $_POST['userName'];
$passWord = $_POST['userPass'];

$sql = "SELECT customerId, password FROM v5_user WHERE customerId = '" . $userName . "' AND password = '" . $passWord . "'";
    $result = $connection->query($sql) or die($connection->error);
    $row = $result->fetch_assoc();

    if($row['customerId']== $userName && $row['password']== $passWord){
        $_SESSION['user'] = $userName;
        echo "Du är inloggad, välkommen" . $row['customerId'] . "!!";
        
    }else{
        echo "Något gick fel";
    }

}
    if(isset($_POST['submitLogin'])){
        logInUser();
    }

?>