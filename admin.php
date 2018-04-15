<?php
require './sections/header.php';
require './connect/connect.php';
require './classes/adminClasses.php';
echo "<h1>ADMIN</h1>";
session_start();
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

<!-- Uppdatera lagersaldo Funkar bara med ID, vill göra det med Title -->
<div class ="updateProducts">
<form action="updateproducts.php" method="post">
<span>Titel på film</span> <br> <input type="number" name="id" id="id"/> Antal <input type="number" name="stock" min="1" max="100">
<input type ="submit" value="Uppdatera saldo" name="submit">
</form>
</div>
<br>


<!-- <form class='getAllMembersForm' method="POST"> -->
<form class='getAllMembersForm' method="GET">
    <button value="getAllMembers" name="getAllMembers" class="getAllMembers" type="submit">Visa lista för personer som vill ha nyhetsbrev</button>
    <button value="getAllOrders" name="getAllOrders" class="getAllOrders" type="submit">Visa alla ordrar</button>
    <button value="getProducts" name="getProducts" class="getAllProducts" type="submit">Visa alla Produkter</button>

    <button value="sendNewsLetter" name="sendNewsLetter" class="sendNewsLetter" type="submit">Skicka NewsLetter</button>

</form>

<?php



if($_SERVER['REQUEST_METHOD'] == "GET"){
    $newAdmin = new Admin();
    if(isset($_GET['getAllMembers'])){
        $newAdmin->getAllMembers();

    // } else if($_POST['getAllOrders']){
    //     $newAdmin2 = new adminUpdateSendDate();
    //     $newAdmin2->printSavedOrders();

     } else if(isset($_GET['getProducts'])){
        $newAdmin->getAllProducts();
    }
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $newAdmin2 = new adminUpdateSendDate();
    if(isset($_GET['getAllOrders'])){
        $newAdmin2 = new adminUpdateSendDate();
        $newAdmin2->printSavedOrders();

    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $adminKey = $_POST['adminKey'];
    $newAdmin2 = new adminUpdateSendDate();
    $newAdmin2->printSavedOrders();

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


       


        // MSK - Trycka i att order är skickad. Datum sätts - VG KRAV 
        // MSK - Trycka i att order är mottagen -- Datum sätts - KRAV FRÅN KUNDSIDAN

        function getAllProducts(){
            global $connection;
            $sql = "SELECT id,title, price, description, year, stock FROM V5_products ORDER BY title ASC";

            $result = $connection->query($sql);
            echo "<form method='post'>";
            echo "<select name='idOfSelect'>";
            echo '<option value="Green">Green</option>';

            while ($row = $result->fetch_assoc()) {
        
                          $title = $row['title'];
                          $id = $row['id'];
                          echo '<option value="'.$id. '">'.$title.'</option>';
                                                     
        }
    

        // <form action="#" method="post">
        // <select name="Color">
        // </select>
        // <input type="submit" name="submit" value="Get Selected Values" />
        // </form>
        // <?php
        // if(isset($_POST['submit'])){
        // $selected_val = $_POST['Color'];  // Storing Selected Value In Variable
        // echo "You have selected :" .$selected_val;  // Displaying Selected Value
        // }
            echo "</select>";
            echo "<button type='submit2' name='submit2'>Visa</button>";
            echo "</form>";
            if(isset($_POST['submit2'])){
                $selected_val = $_POST['idOfSelect'];
                        echo "You have selected :" .$selected_val;  // Displaying Selected Value

            }
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








