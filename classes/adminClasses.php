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
                $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
                $result = $connection->query($sql);
                
                // header("Refresh:0");

                }
                
            }
             
        }

        function makeAdmin(){
            global $connection;
                    $sql = "SELECT * FROM v5_user";
            
                    $result = $connection->query($sql);
                    $row = $result->fetch_assoc();
                foreach($result as $listOfAdmin ){
                    echo "<div id='showOrders'>";
                    echo "<br> Användare: " . $listOfAdmin['customerId']. 
                    " Admin " . $listOfAdmin['admin'].
                    "<form method='POST'><button name='memberKey' value='" . $listOfAdmin['customerId'] . "' type='submit' class='sendOrderButton'>Gör till Admin</button></form>
        
                    <br><br>";
                    echo "</div>";
    
                    if(isset($_POST['memberKey']) and $_POST['memberKey'] == $listOfAdmin['customerId']){
                        $createThisAdmin = $_POST['memberKey'];

                        $sql = "UPDATE v5_user SET admin = 1 WHERE customerId=  '$createThisAdmin'";

                        $result = $connection->query($sql);
                        
                        // header("Refresh:0");
        
                    }
                }
        }

    } // Här slutar AdminsendDateClass

    // } // Här stängs function makeAdmin
// }// Här stängs AdminList
    
?>