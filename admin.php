<?php
require './sections/header.php';
require './connect/connect.php';
echo "<h1>ADMIN</h1>";
?>
<form class='getAllMembersForm' method="POST">
    <button value="heeeej" name="yes" class="getAllMembers" type="submit">Visa lista för personer som vill ha nyhetsbrev</button>
    <button value="heeeej" name="test2" class="getAllMembers" type="submit">Visa alla ordrar</button>
    <button value="heeeej" name="getProducts" class="getAllProducts" type="submit">Visa alla Produkter</button>
</form>



<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $newAdmin = new Admin();
    if(isset($_POST['yes'])){
        echo "tryckt";
        $newAdmin->getAllMembers();

    }

    elseif($_POST['test2'] != null){
        $newAdmin->getAllOrders();
    } 


    //print_r($_POST['yes']);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $newAdminProducts = new Admin();
    if(isset($_POST['getProducts'])){
        $newAdminProducts->getAllProducts();
    }
}

// if ($_POST['getProducts'] != null){
//     $newAdmin->getAllProducts();
// }

// abstract class Admin2 {

//     public function getConnectionToDatabase(){
//         global $connection;
//         $result = $connection->query($sql);
//     }
// } 

// class GetAllMembers extends Admin2{
//     // $sql = "SELECT name, email FROM V5_NewsEmailList";

//     // if ($result->num_rows > 0) {
                
//     //     while($row = $result->fetch_assoc()) {
//     //             echo "<br> namn: ". $row["name"]. " email: ". $row["email"]. "<br><br>";
//     //     }
//     // } else {
//     //     echo "0 results";
//     //     }

//     }



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
            $sql = "SELECT customerId, orderDate, shippedDate, deliveryDate, totalPrice, deliveryName FROM V5_Order";

            $result = $connection->query($sql);

        if ($result->num_rows > 0) {
                
            while($row = $result->fetch_assoc()) {
                    echo "<br> customerid: ". $row["customerId"]. " shippeddate: ". $row["shippedDate"]. "<br><br>";
            }
        } else {
            echo "0 results";
            }

        }

        function getAllProducts(){
            global $connection;
            $sql = "SELECT title, price, description, year, stock FROM V5_products";

            $result = $connection->query($sql);

            echo "<select name='id'>";

            while ($row = $result->fetch_assoc()) {
        
                          unset($id);
                          $id = $row['title'];
                          echo '<option value="'.$id.'">'.$id.'</option>';
                         
        }
        
            echo "</select>";



  
    
            }
    





        // }

        
        




}//class admin slut 








