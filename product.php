<?php
    session_start();    
    require './sections/header.php';
    require './classes/productClasses.php';
    require './menu.php';
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        /*if(isset($_POST['cat'])){
            //echo $_POST['cat'];
            $id = $_POST['cat'];
            $productPage = new Product($id);
            $productPage->printProductPage();
        }*/

         if(isset($_POST['idIMG'])){
             print_r($idIMG);
            $idIMG=$_POST['idIMG'];
            $productPage = new Product($id);
            $productPage->printProductPage();
            
        }
            



    }
     

    //$productPage = new Product(5);
    //$productPage->printProductPage();

    require './sections/footer.php';
?>

