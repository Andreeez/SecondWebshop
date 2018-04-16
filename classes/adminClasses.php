<?php
require './connect/connect.php';


// class adminUpdateSendDate{
//     // public $id;
//     // public $adminKey;
//     // function __construct(){
//     //     //         $this->id = $id;
//     //     //         $this->adminKey = $adminKey;

       

//     //     }

//     function printSavedOrders(){

//         global $connection;
//         $sql = "SELECT * FROM V5_Order";

//         $result = $connection->query($sql);
//         $row = $result->fetch_assoc();
//         foreach($result as $item ){
//             echo "<br> orderId: " . $item['id']. 
//             " CustomerId: ". $item['customerID']. 
//             " totalPrice: " . $item['totalPrice'].
//             " orderDate: " . $item['orderDate']. 
//             " shippeddate: ". $item['shippedDate']. 
//             " deliveryDate: " .$item['deliveryDate'].
//             "<form method='POST'><button name='adminKey' value='" . $item['id'] . "' type='submit'>Skicka Order</button></form>

//             <br><br>";

//             if(isset($_POST['adminKey']) and $_POST['adminKey'] == $item['id']){
//             echo $_POST['adminKey'];
//             $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
//             $result = $connection->query($sql);
            
//             header("Refresh:0");

//             }
//         }

//     }
// }




class adminUpdateSendDate{
        public $id;
        public $adminKey;
        // function __construct($id, $adminKey){
        // public $id;
        // public $adminKey;
        // function __construct(){
        //     //         $this->id = $id;
        //     //         $this->adminKey = $adminKey;
    
            
    
        //     }
    
        function printSavedOrders(){
    
                global $connection;
                $sql = "SELECT * FROM V5_Order";
        
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();

            foreach($result as $item ){
                echo "<div id='showOrders'";
                echo "<br> Order Id: " . $item['id']. 
                " Kund Id: ". $item['customerID']. 
                " Totalpris: " . $item['totalPrice'].
                " Datum Order: " . $item['orderDate']. 
                " Datum Skickat: ". $item['shippedDate']. 
                " Datum Levererat: " .$item['deliveryDate'].
                "<form method='POST'><button class='sendOrderButton' name='adminKey' value='" . $item['id'] . "' type='submit'>Skicka Order</button></form>
                
                <br><br>";
                echo "</div>";
    
                if(isset($_POST['adminKey']) and $_POST['adminKey'] == $item['id']){
                // echo $_POST['adminKey'];
                $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
                $result = $connection->query($sql);
                
                
            }
                header("Refresh:0");
            }
            
        }
    }
    
        // function __construct($id, $adminKey){
    //         $this->id = $id;
    //         $this->adminKey = $adminKey;
    // }
   
    // function printSavedOrders(){
    //     global $connection;
    //     $sql = "SELECT id,customerId, orderDate, shippedDate, deliveryDate, totalPrice, deliveryName FROM V5_Order";
    //     $result = $connection->query($sql);

    //     if ($result->num_rows > 0) {
                
    //         while($row = $result->fetch_assoc()) {
    //                 echo "<br> orderId: " . $row['id']. 
    //                 " CustomerId: ". $row['customerId']. 
    //                 " totalPrice: " . $row['totalPrice'].
    //                 " orderDate: " . $row['orderDate']. 
    //                 " shippeddate: ". $row['shippedDate']. 
    //                 " deliveryDate: " .$row['deliveryDate'].
    //                 "<form method='POST'><button name='adminKey' value='" . $row['id'] . "' type='submit'>Skicka Order</button></form>

    //                 <br><br>";

    //                 if(isset($_POST['adminKey']) and $_POST['adminKey'] == $row['id']){
    //                     echo $_POST['adminKey'];
    //                     $sql = "UPDATE v5_order SET shippedDate = current_date() WHERE id=" . $_POST['adminKey'];
    //                     $result = $connection->query($sql);
                        
    //                     //header("Refresh:0");

    //                 }
    //         }
    //     } else {
    //         echo "0 results";
    //         }
         
    //     }

    // }


    // " <button onclick='upDateShippedDate(" . $this->adminKey . ")'>Order Skickad</button>


?>