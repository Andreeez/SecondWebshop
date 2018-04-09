<?php

// start session 
session_start();


$_SESSION['cart']=array();
$id=$_POST['id'];

array_push($_SESSION['cart'], $id);  

?>