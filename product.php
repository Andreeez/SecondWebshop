<?php
    session_start();    
    require './sections/header.php';
    require './classes/productClasses.php';
    require './menu.php';
    

 //   if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['addToCart'])){
            $id=$_POST['addToCart'];
        
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
        
            array_push($_SESSION['cart'], $id);  
        }

        if(isset($_GET['cat'])){
            //echo $_POST['cat'];
            $id = $_GET['cat'];
            $productPage = new Product($id);
            $productPage->printProductPage();
        }

         
            



   // }
     

    //$productPage = new Product(5);
    //$productPage->printProductPage();

    require './sections/footer.php';
?>

