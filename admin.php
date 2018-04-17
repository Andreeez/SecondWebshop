<?php
require './sections/header.php';
require './connect/connect.php';
require './classes/adminClasses.php';


if(isset($_SESSION['admin'])){
    echo "<h3 class='welcomeAdmin'>Välkommen Admin ". $_SESSION['admin'] . " </h3>";
} else {
    die();
}
?>

<!-- Meny för att ta fram funktioner -->
<form class='getAllMembersForm' method="GET">
    <button value="getAllMembers" name="getAllMembers" class="getAllMembers" id="adminButtonMeny" type="submit"><i class="fa fa-users"></i> <br/>Kunder</button>
    <button value="getAllOrders" name="getAllOrders" class="getAllOrders" id="adminButtonMeny" type="submit"><i class="fas fa-shopping-cart"></i><br/> Ordrar</button>
    <button value="getProducts" name="getProducts" class="getAllProducts" id="adminButtonMeny" type="submit"><i class="fas fa-film"></i><br/> Produkter</button>
    <button value="sendNewsLetter" name="sendNewsLetter" class="sendNewsLetter" id="adminButtonMeny" type="submit"><i class="fas fa-envelope"></i><br/> NewsLetter</button>
    <button value="updateStock" name="updateStock" class="updateStock" id="adminButtonMeny" type="submit"><i class="fas fa-warehouse"></i><br/>  Lagersaldo</button>
    <button value="makeAdmin" name="makeAdmin" class="makeAdmin" id="adminButtonMeny" type="submit"><i class="fas fa-user-secret"></i><br/> Admin </button>
</form>

<?php
//Form för att ta fram funktiner visa Alla som vill ha Nyhetsbrev, Visa alla produkter, Skicka nyhetsbrev formulär.
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $newAdmin = new Admin();
    $showAllOrder = new adminUpdateSendDate();

    if(isset($_GET['getAllMembers'])){
        $newAdmin->getAllMembers();
     } else if(isset($_GET['getProducts'])){
        $newAdmin->getAllProducts();
    } else if(isset($_GET['sendNewsLetter'])){
        $newAdmin->sendNewsLetter();
    } else if(isset($_GET['updateStock'])){
        $newAdmin->updateStock();
    } else if(isset($_GET['makeAdmin'])){
        $showAllOrder->makeAdmin();
    } else if(isset($_GET['getAllOrders'])){
        $showAllOrder->printSavedOrders();
    }
}


//Form för att uppdatera skickat datum

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['adminKey'])){
        $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
        $result = $connection->query($sql);

        $showAllOrder = new adminUpdateSendDate();
        $showAllOrder->printSavedOrders();

    } else if(isset($_POST['memberKey'])){
        $createThisAdmin = $_POST['memberKey'];

        $sql = "UPDATE v5_user SET admin = 1 WHERE customerId=  '$createThisAdmin'";

        $result = $connection->query($sql);
        
        $showAllOrder = new adminUpdateSendDate();
        $showAllOrder->makeAdmin();
    }
}

