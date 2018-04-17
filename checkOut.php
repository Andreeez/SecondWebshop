<?php   
require './sections/header.php';
if(!isset($_SESSION['deliveryOption'])){
$_SESSION['deliveryOption'] = $_POST['deliveryOption'];
}
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
    echo "<div class='sentOrder'>Tack. Vi har tagit emot din order och skickar den så fort vi kan.</div>";
    if (!isset($_COOKIE["newsletter"])){
        newsletterSubscription();
    }
    
    newOrder();
}

if (isset($_POST['fName'])){
    echo "<div class='sentOrder'>Tack " . $_POST['fName'] . ". Vi har tagit emot din order och skickar den så fort vi kan.</div>";
    if (!isset($_COOKIE["newsletter"])){
        newsletterSubscription();
    }
    newCustomerFromCheckOut();
    newOrder();
}



require './sections/footer.php';
?>