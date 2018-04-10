<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $key=$_POST['key'];

    unset($_SESSION['cart'][$key]);
    
}
?>