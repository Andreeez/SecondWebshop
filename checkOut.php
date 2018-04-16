<?php   
require './sections/header.php';


$_SESSION['deliveryOption'] = $_POST['deliveryOption'];

print_r($_SESSION['cart']);
echo $_SESSION['deliveryOption'];
echo $_POST['totalPrice'];
?>

<form method="POST" class="checkOutForm" action ="test.php">
    <input type="text" class="checkOutFormInput" placeholder="Förnamn" name="fName"/>
    <input type="text" class="checkOutFormInput" placeholder="Efternamn" name="lName"/>
    <input type="text" class="checkOutFormInput" placeholder="Email" name="email" id="checkOutFormInputUser"/>
    <input type="text" class="checkOutFormInput" placeholder="Adress" name="adress"/>
    <input type="text" class="checkOutFormInput" placeholder="postnummer" name="postCode"/>
    <input type="text" class="checkOutFormInput" placeholder="Stad" name="city"/>
    <input type="text" class="checkOutFormInput" placeholder="Telefonnummer" name="phone"/>

    <input type="submit" name="checkOutNewCustomer"/>
</form>



<?php
require './sections/footer.php';
?>