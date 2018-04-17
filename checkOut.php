<?php   
require './sections/header.php';
$_SESSION['deliveryOption'] = $_POST['deliveryOption'];
calculateTotalPriceCheckOut();

//Körs ifall man kommer ifrån kundvagns-sidan
if (isset($_POST['deliveryOption']) and !isset($_SESSION['user'])){

    echo '<div class="checkOutWrap"><div class="checkOutWrap2"><div class="totalPriceCheckOut">';
            printTotalPriceCheckOut();

echo '</div><form method="POST" class="checkOutForm" action ="checkOut.php">
    <input type="text" class="checkOutFormInput" placeholder="Förnamn" name="fName"/>
    <input type="text" class="checkOutFormInput" placeholder="Efternamn" name="lName"/>
    <input type="text" class="checkOutFormInput" placeholder="Email" name="email" id="checkOutFormInputUser"/>
    <input type="text" class="checkOutFormInput" placeholder="Adress" name="adress"/>
    <input type="text" class="checkOutFormInput" placeholder="postnummer" name="postCode"/>
    <input type="text" class="checkOutFormInput" placeholder="Stad" name="city"/>
    <input type="text" class="checkOutFormInput" placeholder="Telefonnummer" name="phone"/><br><br>

    <input type="submit" value="Skicka order" name="checkOutNewCustomer" class="checkOutNewCustomer"/>
</form>
</div>
</div>';
}

if (isset($_SESSION['user'])){
    echo "Tack. Vi har tagit emot din order och skickar den så fort vi kan.";
    newOrder();
}

if (isset($_POST['fName'])){
    echo "Tack " . $_POST['fName'] . ". Vi har tagit emot din order och skickar den så fort vi kan.";
newCustomerFromCheckOut();
newOrder();
}

//Räknar ut totalpris på checkoutsidan och sparar det i session för att skickas in i DB.
function calculateTotalPriceCheckOut(){
    global $connection;
    $sql = "SELECT price FROM v5_delivery WHERE name = '" . $_POST['deliveryOption'] . "'";
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
    
    // function newOrderLoggedIn(){
    //     global $connection;
    //     $sql = "SELECT * FROM v5_customer where id = " . $_SESSION['user'];
    //     $result = $connection->query($sql);
    //     $row = $result->fetch_assoc();


    // }


    
    
}





require './sections/footer.php';
?>