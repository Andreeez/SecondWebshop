<?php
session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){ 
    $key=$_POST['key'];

    
    unset($_SESSION['cart'][$key]);
    echo $key;

    



    // if(!isset($_SESSION['cart'])){
    //     $_SESSION['cart'] = array();
    // }

   // array_push($_SESSION['cart'], $id);  
// }
?>