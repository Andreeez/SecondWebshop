<?php
require './connect/connect.php';
class adminUpdateSendDate{
        public $id;
        public $adminKey;
    
        function printSavedOrders(){
    
                global $connection;
                $sql = "SELECT * FROM v5_order";
        
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
            foreach($result as $item ){
                echo "<div id='showOrders'>";
                echo "<br> OrderId: " . $item['id']. 
                " KundId: ". $item['customerID']. 
                " Totalpris: " . $item['totalPrice'].
                " Datum Order: " . $item['orderDate']. 
                " Datum Skickat: ". $item['shippedDate']. 
                " Datum Levererat: " .$item['deliveryDate'].
                "<form method='POST'><button name='adminKey' value='" . $item['id'] . "' type='submit' class='sendOrderButton'>Skicka Order</button></form>
    
                <br><br>";
                echo "</div>";
    
                if(isset($_POST['adminKey']) and $_POST['adminKey'] == $item['id']){
                // echo $_POST['adminKey'];
                $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
                $result = $connection->query($sql);
                
                // header("Refresh:0");

                }
                
            }
               

        }
    }
    
?>