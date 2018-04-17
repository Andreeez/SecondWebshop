<?php  
    require './sections/header.php';
    require './classes/productClasses.php';
   
    //Ta bort produkt från kundvagn
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $key=$_POST['removeFromCart'];
        
        unset($_SESSION['cart'][$key]);
    }


    function printShoppingCart(){

        //Toppen av Cart tabellen
        echo "<div class='cartTitle'>Din Kundvagn</div>";
        echo "<div class='cartContainer'>";
        echo "<div class='cartBox1'><table class='cartTable1'><tr class='row1'><th></th><th>Produkt</th><th>Pris</th><th>Ta bort</th></tr>";
        foreach ($_SESSION['cart'] as $key => $value) {
            $cartProduct = new Product($value);
            $cartProduct->printCartProduct($key);
        }
        //Slutet av tabellen  
        echo "</table></div>";
    }
    //Skicka in detta som WHERE
    function calculateTotalPrice(){
            $cartTotalPrice = 0;
        foreach ($_SESSION['cart'] as $value) {
            global $connection;
            $sql = "SELECT price FROM v5_products where id = $value";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            
            $cartTotalPrice += $row['price'];
            
        }
        $_SESSION['cartTotalPrice'] = $cartTotalPrice;
        echo "<script>var cartTotalPrice = $cartTotalPrice</script>";
        echo "<div id='totalPrice'>Totalpris: " . $cartTotalPrice . " kr</div></div>";
        echo "</div>";
        echo "</div>";


    }
   
    

    function printDeliveryOptions(){
        global $connection;
        $sql = "SELECT * FROM v5_delivery";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        //Form för fraktalternativen
        echo "<div class='cartBox2'>";
        echo "<div class='deliveryAndTotal'>";
        echo "<form action='./checkOut.php' method='POST'>";
        echo "<table class='cartTable2'><tr><th>Fraktalternativ</th><th>Pris</th><th>Leveranstid</th></tr>";
        
        $deliveryOptionNum = 1; 
        foreach ($result as $row){
            echo "<tr><td><input type='radio' class='radio' id='" . $row['name'] . "' onclick='deliveryOptionOC" . $deliveryOptionNum . "()' name='deliveryOption' value='" . $row['name'] . "'>" . $row['name'] . "</td>" .
            "<td>" . $row['price'] . " kr</td><td>" . $row['deliveryTime'] . "</td></tr>";
            echo "<script>var deliveryOptionPrice" . $deliveryOptionNum . " = ".  $row['price'] . "</script>";
            $deliveryOptionNum ++;
        }
            //"Gå till kassa"-knappen
        echo "</table><input type='submit' id='buy' value='Gå till kassa'></form>";
       
    }



if($_SESSION['cart'] == null){
    echo "<h1 class='cartEmpty'>Din kundvagn är tom</h1>";
}else{
    printShoppingCart();
    printDeliveryOptions();
    calculateTotalPrice();
}






    
    require './sections/footer.php';
?>