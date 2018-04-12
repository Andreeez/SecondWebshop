<?php
require './connect/connect.php';


class adminUpdateSendDate{
    public $id;
    public $adminKey;
    function __construct($id, $adminKey){
            $this->id = $id;
            $this->adminKey = $adminKey;
    }
   
    function printSavedOrders(){
        global $connection;
        $sql = "SELECT id,customerId, orderDate, shippedDate, deliveryDate, totalPrice, deliveryName FROM V5_Order";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
                
            while($row = $result->fetch_assoc()) {
                    echo "<br> orderId: " . $row['id']. 
                    " CustomerId: ". $row['customerId']. 
                    " totalPrice: " . $row['totalPrice'].
                    " orderDate: " . $row['orderDate']. 
                    " shippeddate: ". $row['shippedDate']. 
                    " deliveryDate: " .$row['deliveryDate'].
                    "<form method='POST'><button name='adminKey' value='" . $row['id'] . "' type='submit'>Skicka Order</button></form>

                    <br><br>";

                    if($_POST['adminKey'] == $row['id']){
                        echo "hej";
                        echo $_POST['adminKey'];
                        // $sql = "UPDATE v5_order SET totalPrice='1200' WHERE id=" . $_POST['adminKey']; 
                        // $sql = "UPDATE v5_order SET shippedDate VALUE ('DATETIME: Auto CURDATE()', CURDATE() ) WHERE id=" . $_POST['adminKey']; 
                        $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
                        // $sql = "UPDATE v5_order SET shippedDate VALUE ('DATETIME: Auto CURDATE()', CURDATE() ) WHERE id=" . $_POST['adminKey'];
                        // UPDATE mytblname SET `date`="2011-06-14", `time`="12:10:00" WHERE email="somevalue";

                        $result = $connection->query($sql);


                    }
            }
        } else {
            echo "0 results";
            }
         
        }

    }


    // " <button onclick='upDateShippedDate(" . $this->adminKey . ")'>Order Skickad</button>



?>