<?php
    session_start();    
    require './sections/header.php';
    require './classes/productClasses.php';
   
    //Ta bort produkt från kundvagn
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $key=$_POST['removeFromCart'];
        
        unset($_SESSION['cart'][$key]);
    }


    function printShoppingCart(){
        //Toppen av Cart tabellen
        echo "<table><tr><th></th><th>Produkt</th><th>Pris</th><th>Ta bort</th></tr>";
        foreach ($_SESSION['cart'] as $key => $value) {
            $cartProduct = new Product($value);
            $cartProduct->printCartProduct($key);
        }
        //Slutet av tabellen  
        echo "</table>";
    }
    printShoppingCart();  
    

    
    
        

    
    require './sections/footer.php';
?>