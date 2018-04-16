<?php
/*require 'sections/header.php';*/
require './connect/connect.php';
function logInUser(){
global $connection; 

//Sparar värde av inputs i variabel
$userName = $_POST['userName'];
$passWord = md5($_POST['userPass']);

//Hämtar sql rad
$sql = "SELECT customerId, password, admin FROM v5_user WHERE customerId = '" . $userName . "' AND password = '" . $passWord . "'";
    $result = $connection->query($sql) or die($connection->error);
    $row = $result->fetch_assoc();

    //Om användare finns och inte är admin
    if($row['customerId']== $userName && $row['password']== $passWord && $row['admin']== 0){
        $_SESSION['user'] = $userName;
       header('location: ./index.php'); 
        echo "Välkommen" . $row['customerId'] . "!!";
        
    //Om användare är admin    
    }if($row['customerId']== $userName && $row['password']== $passWord && $row['admin']== 1){
        $_SESSION['admin'] = $userName;
        if(isset($_SESSION['admin'])){
            echo "Hej Admin" . $row['customerId'];
            header('location: ./admin.php');

        } 
    }
    if($row['customerId'] != $userName && $row['password']!= $passWord){
    echo "Vänligen skriv in en annan epost eller lösenord";
}
}

//Kör login funktion
    if(isset($_POST['submitLogin'])){
        logInUser();
    }
?>


