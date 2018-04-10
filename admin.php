<?php
require './sections/header.php';
require './connect/connect.php';
echo "<h1>ADMIN</h1>";
?>

<!-- LÄGG DIN KOD HÄR KRASSE -->

<div class ="sendNewletters">
<form action="send-newsletter.php" method="post">
    <span>Titel på nyhetsbrev</span> <br> <input type="text" name="subject" id="subject"/> <br>
   <span> Brödtext till nyhetsbrev </span> <br><textarea cols="40" rows="10" name="bodytext" id="bodytext"> </textarea> <br>
   <input type ="submit" value="skicka" name="submit"> 

</form>
</div>
<br>
<form class='getAllMembersForm' method="POST">
    <button value="getAllMembers" name="getAllMembers" class="getAllMembers" type="submit">Visa lista för personer som vill ha nyhetsbrev</button>
    <button value="getAllOrders" name="getAllOrders" class="getAllOrders" type="submit">Visa alla ordrar</button>
    <button value="getProducts" name="getProducts" class="getAllProducts" type="submit">Visa alla Produkter</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $newAdmin = new Admin();
    if($_POST['getAllMembers']){
        $newAdmin->getAllMembers();

    } else if($_POST['getAllOrders']){
        $newAdmin->getAllOrders();

    } else if($_POST['getProducts']){
        $newAdmin->getAllProducts();
    }
}

class Admin {
    

    function getAllMembers(){
        global $connection;

            $sql = "SELECT name, email FROM V5_NewsEmailList";

            $result = $connection->query($sql);

        if ($result->num_rows > 0) {
                
            while($row = $result->fetch_assoc()) {
                    echo "<br> namn: ". $row["name"]. " email: ". $row["email"]. "<br><br>";
            }
        } else {
            echo "0 results";
            }

        }

        function getAllOrders(){
            global $connection;
            $sql = "SELECT id,customerId, orderDate, shippedDate, deliveryDate, totalPrice, deliveryName FROM V5_Order";

            $result = $connection->query($sql);

        if ($result->num_rows > 0) {
                
            while($row = $result->fetch_assoc()) {
                    echo "<br> orderId: " . $row["id"]. " CustomerId: ". $row["customerId"]. " totalPrice: " . $row['totalPrice']." orderDate: " . $row['orderDate']. " shippeddate: ". $row["shippedDate"]. " deliveryDate: " .$row['deliveryDate']." <br><br>";
            }
        } else {
            echo "0 results";
            }

        }

        // MSK - Trycka i att order är skickad. Datum sätts - VG KRAV
        // MSK - Trycka i att order är mottagen -- Datum sätts - Ej krav enligt issue

        function getAllProducts(){
            global $connection;
            $sql = "SELECT title, price, description, year, stock FROM V5_products ORDER BY title ASC";

            $result = $connection->query($sql);

            echo "<select name='id'>";

            while ($row = $result->fetch_assoc()) {
        
                        //   unset($id);
                          $id = $row['title'];
                          echo '<option value="nameOfSelected">'.$id.'</option>';
                          echo '<button>Hej</button>';
                        //   "'.$id.'"
                       
        }
    
            echo "</select>";
            echo "<form method='POST'>";
            echo '<button value="updateProduct" name="updateProduct" class="updateProduct" type="submit">Uppdatera produkt</button>';
            echo '<button value="deleteProduct" name="deleteProduct" class="deleteProduct" type="submit">Ta bort produkt</button>';
            echo '<button value="addProduct" name="addProduct" class="addProduct" type="submit">Lägg till Produkt</button>';
            echo "</form>";


    


        
        }

     

        

        // MSK -    uppdatera produkter lagersaldo
        // MSK -    Redigera produkter
        // MSK -    lägga till och ta bort produkter
    
}//class admin slut 




if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['addProduct']){
      
        echo "<form>";
        
        echo "<input type='text'>";
        echo "</form>";

    } else if($_POST['deleteProduct']){
        echo "delete";

    } else if($_POST['updateProduct']){
        echo "update";
        echo "<form>";
        echo "<label>Titel</label>";
        echo "<input name='sendUpdateFromForm' type='text'>";
        echo "<button value='sendUpdatedProduct' name='sendUpdatedProduct' type='submit'>Uppdatera produkt</button>";
        echo "</form>";
    }
}

$tableForUpdate = "v5_products";  

$name= $_POST['sendUpdateFromForm']; 


if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['sendUpdatedProduct']){
        global $connection;
        $sql = "SELECT title, price, description, year, stock FROM V5_products ORDER BY title ASC";

        $result = $connection->query($sql);
        $query= "INSERT INTO $table  ". "VALUES ('$name')"; 


    }
}








