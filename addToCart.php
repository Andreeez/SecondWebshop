<?php

// start session 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

$id=$_POST['id'];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $id);  


echo json_encode($_SESSION['cart']);
?>