<?php
require './connect/connect.php';
class adminUpdateSendDate{
        public $id;
        public $adminKey;
        public $memberKey;

        function printSavedOrders(){

                global $connection;
                $sql = "SELECT * FROM v5_order";
        
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
            foreach($result as $item ){
                echo "<div id='showOrders'>";
                echo "<table class='tableAdmin' style='width:80%'> <tr> <th> OrderId: </th> <th> KundId: </th> <th> Totalpris: </th> <th> Datum Order: </th> <th> Datum Skickat: </th> <th> Datum Levererat: </th>";
                echo '<tr>';
                echo '<td>' . $item['id']. '</td>';
                echo '<td>' . $item['customerID']. '</td>';
                echo '<td>' . $item['totalPrice']. '</td>';
                echo '<td>' . $item['orderDate'].  '</td>';
                echo '<td>' . $item['shippedDate']. '</td>';
                echo '<td>' .$item['deliveryDate']. '</td>';
                echo "<td> <form method='POST'><button name='adminKey' value='" . $item['id'] . "' type='submit' class='sendOrderButton'>Skicka Order</button></form> '</td>"; 
                echo '<tr>';
                echo '</table>';
                echo "</div>";
         
            
        }
     
        
        }

        function makeAdmin(){
      
            global $connection;
                    $sql = "SELECT * FROM v5_user";
            
                    $result = $connection->query($sql);
                    $row = $result->fetch_assoc();
                foreach($result as $listOfAdmin ){
                    echo "<div id='showOrders'>";
                    echo "<table class='tableAdmin' style='width:80%'> <tr> <th> Användare: </th> <th> Admin: </th>";
                    echo '<tr>';
                    echo '<td>' . $listOfAdmin['customerId']. '</td>';
                    echo '<td>' . $listOfAdmin['admin']. '</td>';
                    echo "<td><form method='POST'><button name='memberKey' value='" . $listOfAdmin['customerId'] . "' type='submit' class='sendOrderButton'>Gör till Admin</button></form></td>";
                    echo '</tr>';
                    echo '</table>';
                    echo "</div>";
    
                }
        }// Här stängs function makeAdmin

    } // Här slutar AdminsendDateClass

    class Admin {
    
        function getAllMembers(){
            global $connection;
                $sql = "SELECT name, email FROM v5_newsemaillist";
                $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                    
                while($row = $result->fetch_assoc()) {
                        echo '<div id="getMembers">';
                        echo '<table class="tableAdmin" style="width:20%"><tr><th> Namn: </th> <th> Email: </th>';
                        echo '<tr>';
                        echo '<td>' . $row["name"].  '</td>';
                        echo '<td>' . $row["email"]. '</td>';
                        echo '</tr>';
                        echo '</table>';
                        echo '</div>'; 
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
                
                // if(isset($_GET['showSelectedProduct'])){
                //     $selected_val = $_GET['idOfSelect'];
                //     print_r($selected_val);        
                //     echo "You have selected :" .$selected_val;  // Displaying Selected Value
                // }
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
    


    


    
?>