<?php
require './sections/header.php';
require './connect/connect.php';
require './classes/adminClasses.php';


if(isset($_SESSION['admin'])){
    echo "<h3 class='welcomeAdmin'>Välkommen Admin ". $_SESSION['admin'] . " </h3>";
} else {
    die();
}
echo "<h1 id='adminHeader'>ADMIN</h1>";
?>

<!-- Meny för att ta fram funktioner -->
<form class='getAllMembersForm' method="GET">
    <button value="getAllMembers" name="getAllMembers" class="getAllMembers" id="adminButtonMeny" type="submit"><i class="fa fa-users"></i> Kunder</button>
    <button value="getAllOrders" name="getAllOrders" class="getAllOrders" id="adminButtonMeny" type="submit"><i class="fa fa-shopping-cart"></i> Ordrar</button>
    <button value="getProducts" name="getProducts" class="getAllProducts" id="adminButtonMeny" type="submit"><i class="fa fa-film"></i> Produkter</button>
    <button value="sendNewsLetter" name="sendNewsLetter" class="sendNewsLetter" id="adminButtonMeny" type="submit"><i class="fa fa-envelope"></i> Skicka NewsLetter</button>
    <button value="updateStock" name="updateStock" class="updateStock" id="adminButtonMeny" type="submit"><i class="fa fa-dolly"></i> Uppdatera Lagersaldo</button>
    <button value="makeAdmin" name="makeAdmin" class="makeAdmin" id="adminButtonMeny" type="submit"><i class="fa fa-dolly"></i> Admin Användare</button>
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
        $showAllOrder = new adminUpdateSendDate();
        $showAllOrder->printSavedOrders();

    } else if(isset($_POST['memberKey'])){
        $showAllOrder = new adminUpdateSendDate();
        $showAllOrder->makeAdmin();
    }
}

class Admin {
    
    function getAllMembers(){
        global $connection;
            $sql = "SELECT name, email FROM v5_newsemaillist";
            $result = $connection->query($sql);
            
        if ($result->num_rows > 0) {
                
            while($row = $result->fetch_assoc()) {
                    echo "<div id='getMembers'><br> Namn: ". $row["name"]. " Email: ". $row["email"]. "<br><br></div>";
            }
        } else {
            echo "0 results";
            }
        }

        function sendNewsLetter(){
            echo '<div class ="sendNewletters">';
            echo '<form action="send-newsletter.php" method="post">';
            echo '<span>Titel på nyhetsbrev</span> <br> <input type="text" name="subject" id="subject"/> <br>';
            echo '<span> Brödtext till nyhetsbrev </span> <br><textarea cols="40" rows="10" name="bodytext" id="bodytext"> </textarea> <br>';
            echo '<input type ="submit" value="skicka" name="submit">';
            echo '</form>';
            echo '</div>';
        }
        function updateStock(){
            global $connection;
            $sql = "SELECT id,title, price, description, year, stock FROM v5_products ORDER BY title ASC";
            $result = $connection->query($sql);

            echo '<div class ="updateProducts">';
            echo "<select name='idOfSelect'>";
            while ($row = $result->fetch_assoc()) {
        
                $title = $row['title'];
                $id = $row['id'];
                echo '<option value="'.$id. '">Id: '. $id. ' Titel: '.$title. '</option>';
                                           
            }
            echo "</select>";
            echo '<form action="updateproducts.php" method="post">';
            echo '<span>Titel på film</span> <input type="text" name="title" id="title"/> Antal <input type="number" name="stock" min="1" max="100">';
            echo '<input type ="submit" value="Uppdatera saldo" name="submit">';
            echo '</form>';
            echo '</div>';
        }
        function getAllProducts(){
            global $connection;
            $sql = "SELECT id,title, price, description, year, stock FROM v5_products ORDER BY title ASC";
            $result = $connection->query($sql);
            echo "<div id='showAllProducts'>";
            echo "<form method='GET'>";
            echo "<select name='idOfSelect'>";
            while ($row = $result->fetch_assoc()) {
        
                          $title = $row['title'];
                          $id = $row['id'];
                          echo '<option value="'.$id. '">Id: '. $id. ' Titel: '.$title. '</option>';
                                                     
        }
    
            echo "</select>";
            echo "<button type='submit' name='showSelectedProduct'>Visa</button>";
            echo "</form>";
            
            if(isset($_GET['showSelectedProduct'])){
                $selected_val = $_GET['idOfSelect'];
                print_r($selected_val);        
                echo "You have selected :" .$selected_val;  // Displaying Selected Value
            }
            // echo "<form method='POST'>";
            // echo '<button value="updateProduct" name="updateProduct" class="updateProduct" type="submit">Uppdatera produkt</button>';
            // echo '<button value="deleteProduct" name="deleteProduct" class="deleteProduct" type="submit">Ta bort produkt</button>';
            // echo '<button value="addProduct" name="addProduct" class="addProduct" type="submit">Lägg till Produkt</button>';
            // echo "</form>";
            echo "</div>";

            // if($_SERVER['REQUEST_METHOD'] == "GET"){
            //     // $newAdmin = new Admin();
            //     if(isset($_GET['idOfSelect'])){
            //         $newAdmin->showSelectedValue();
            //      } 
            // }
        }
     
        function showSelectedValue(){
            print_r($selected_val);        

        }
        // MSK -    uppdatera produkter lagersaldo
        // MSK -    Redigera produkter
        // MSK -    lägga till och ta bort produkter
    
}//class admin slut 
// **** HÄR ÄR KOD SOM SKA KÖRAS TA EJ BORT *********************************************************///
// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     if($_POST['addProduct']){
      
//         echo "<form>";
        
//         echo "<input type='text'>";
//         echo "</form>";
//     } else if($_POST['deleteProduct']){
//         echo "delete";
//     } else if($_POST['updateProduct']){
//         echo "update";
//         echo "<form>";
//         echo "<label>Titel</label>";
//         echo "<input name='sendUpdateFromForm' type='text'>";
//         echo "<button value='sendUpdatedProduct' name='sendUpdatedProduct' type='submit'>Uppdatera produkt</button>";
//         echo "</form>";
//     }
// }
// $tableForUpdate = "v5_products";  
// $name= $_POST['sendUpdateFromForm']; 
// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     if($_POST['sendUpdatedProduct']){
//         global $connection;
//         $sql = "SELECT title, price, description, year, stock FROM V5_products ORDER BY title ASC";
//         $result = $connection->query($sql);
//         $query= "INSERT INTO $table  ". "VALUES ('$name')"; 
//     }
// }
