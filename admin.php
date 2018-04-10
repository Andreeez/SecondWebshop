<?php
require './sections/header.php';
require './connect/connect.php';
echo "<h1>ADMIN</h1>";
?>
<form class='getAllMembersForm' method="POST">
<button value="heeeej" name="yes" class="getAllMembers" type="submit">Visa lista för personer som vill ha nyhetsbrev</button>
<button value="heeeej" name="test2" class="getAllMembers" type="submit">Visa alla ordrar</button>
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


        




}//class admin slut 








