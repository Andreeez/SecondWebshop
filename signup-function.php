<?php
/*require 'sections/header.php';*/
require 'connect/connect.php';

function saveNewUser(){

    global $connection;
//sparar inputs i variablar
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $postCode = $_POST['postCode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $newPass = md5($_POST['newPass']);
    $confirmPass = md5($_POST['confirmPass']);

    //Kollar om formuläret är korrekt ifyllt
    if($newPass == $confirmPass && isset($email, $fName, $lName, $adress, $postCode, $city, $newPass, $confirmPass)){
      
         $sqlCustomer = "INSERT INTO `v5_customer`(id, fName, lName, address, postalCode, city, phoneNumber) VALUES('$email','$fName', '$lName', '$adress', '$postCode', '$city', '$phone')";
         $sqlUser = "INSERT INTO `v5_user`(customerId, password)VALUES('$email', '$confirmPass')";
         $resultCustomer = $connection->query($sqlCustomer) or die($connection->error);
         $resultUser = $connection->query($sqlUser) or die($connection->error);
         echo "Välkommen" . $fName;
         }else{
             echo "Löseordet stämmer inte överens, vänligen försök igen";
         }
     }

        if(isset($_POST['signUpNewUser'])){
            saveNewUser();
        }


?>