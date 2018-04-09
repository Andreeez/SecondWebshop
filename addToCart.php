<?php

// start session 
session_start();


$id=$_POST['id'];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $id);  
print_r($SESSION['cart']);
?>