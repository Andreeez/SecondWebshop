<?php
function newsletterSubscription(){
    $subscribed =   "<div id ='alreadySubscribed'>
    Tack för att du anmält dig för nyhetsbrev! 
    </div>";

    $newsletterBox =    "<div class='newsletterBox'> 
    <h4>Anmäl dig för Nyhetsbrev</h4>
    <form class='newsletterBox' action='newsletter-signup.php' method='post'> 

    <input class='newsLetterInput' placeholder='Name' type='text' name='name' id='name'/>

    <input class='newsLetterInput' placeholder='Email' type='text' name='email' id='email'/>
    <input class='newsLetterButton' type='submit' name=submit value='Submit'/> 
    </form> 

    </div>";
echo "<div class='alreadySubscribed'>";
if(isset($_COOKIE["newsletter"])){
    echo 
   $_COOKIE['newsletter']."!".$subscribed;
    echo "</div>";
} else{
    
   echo
     $newsletterBox;

}
}

//Räknar ut totalpris på checkoutsidan och sparar det i session för att skickas in i DB.
function calculateTotalPriceCheckOut(){
    global $connection;
    $sql = "SELECT price FROM v5_delivery WHERE name = '" . $_SESSION['deliveryOption'] . "'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    

    $_SESSION['totalPrice'] = $_SESSION['cartTotalPrice'] + $row['price'];
}

//Skriver ut totalpris på checkoutsidan.
function printTotalPriceCheckOut(){
    
    $totalPrice = $_SESSION['totalPrice'];
    $deliveryOption = $_POST['deliveryOption'];
    echo "Totalpris på order: " . $totalPrice . " kr</br>";
    echo "Fraktalternativ: " . $deliveryOption;
    
}

//Skapar kund om man inte är inloggad i checkout
function newCustomerFromCheckOut(){
    global $connection;
    //sparar inputs i variablar
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $adress = $_POST['adress'];
        $postCode = $_POST['postCode'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];

        if($_POST['phone'] == ""){
            $phone = "NULL";
        }

        $sqlCustomer = "INSERT INTO `v5_customer`(id, fName, lName, address, postalCode, city, phoneNumber) VALUES('$email','$fName', '$lName', '$adress', '$postCode', '$city', $phone)";
        $resultCustomer = $connection->query($sqlCustomer) or die($connection->error);
    
}

//Skickar ordern till databasen.
function newOrder(){
    global $connection;
    if (isset($_SESSION['user'])){
        $email = $_SESSION['user'];
    }
    else{
        $email = $_POST['email'];
    }
    $deliveryOption = $_SESSION['deliveryOption'];
    $totalPrice = $_SESSION['totalPrice'];

    //Insertar in i orders
    $sqlOrder = "INSERT INTO `v5_order` (customerID, orderDate, totalPrice, deliveryName) VALUES('$email', CURRENT_DATE(), '$totalPrice', '$deliveryOption')";
    $resultOrder = $connection->query($sqlOrder) or die($connection->error);
    
    //Slår ihop duplikat i kundvagnen.
    $finalCart = (array_count_values($_SESSION['cart']));

    foreach ($finalCart as $productId => $quantity) {
        //Insertar in i orderdetails. 
        $sqlOrderDetails = "INSERT INTO `v5_orderdetails` (orderID, productID, quantity) VALUES (LAST_INSERT_ID(), '$productId', '$quantity')";
        $resultOrderDetails = $connection->query($sqlOrderDetails) or die($connection->error);
        //Uppdaterar antal i lager.
        $sqlProducts = "UPDATE `v5_products` SET stock = stock - $quantity WHERE id = $productId";
        $resultProducts = $connection->query($sqlProducts) or die($connection->error);
    }
  
    
}
function printDeliveryOptions(){
    global $connection;
    $sql = "SELECT * FROM v5_delivery";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    //Form för fraktalternativen
    echo "<div class='cartBox2'>";
    echo "<div class='deliveryAndTotal'>";
    echo "<form action='./checkOut.php' onsubmit='return validateDeliveryOption()' method='POST'>";
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

?>