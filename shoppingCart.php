<?php  
    require './sections/header.php';
    require './classes/productClasses.php';
   
    //Ta bort produkt från kundvagn
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $key=$_POST['removeFromCart'];
        
        unset($_SESSION['cart'][$key]);
    }


if(!isset($_SESSION['cart'])){
    echo "<h1 class='cartEmpty'>Din kundvagn är tom</h1>";
}else{
    printShoppingCart();
    printDeliveryOptions();
    calculateTotalPrice();
}

    require './sections/footer.php';
?>