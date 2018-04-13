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
            <input type="text" class="inputLogin" placeholder="Email" name="userName" id="inputLoginUser"/>
            <input type="password" class="inputLogin" placeholder="Lösenord" name="userPass"/>
            <input type="submit" name="submitLogin"/>
        </form>
    </div>
</div>

<?php
function logInUser(){
global $connection; 
session_start();

$userName = $_POST['userName'];
$passWord = md5($_POST['userPass']);

$sql = "SELECT customerId, password, admin FROM v5_user WHERE customerId = '" . $userName . "' AND password = '" . $passWord . "'";
    $result = $connection->query($sql) or die($connection->error);
    $row = $result->fetch_assoc();

    if($row['customerId']== $userName && $row['password']== $passWord && $row['admin']== 0){
        $_SESSION['user'] = $userName;
        echo "Välkommen" . $row['customerId'] . "!!";
        
    }elseif($row['customerId']== $userName && $row['password']== $passWord && $row['admin']== 1){
        $_SESSION['admin'] = "Admin";
        echo "Hej Admin" . $row['customerId'];
        header('location: ./admin.php');
    }else{
    echo "Vänligen skriv in en annan epost eller lösenord";
}
}
    if(isset($_POST['submitLogin'])){
        logInUser();
    }

?>