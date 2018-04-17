<?php
    include './connect/connect.php';
require './sections/header.php';
$userName = $_SESSION['user'];
?>
<div class ="wrapperBox">
<?php
echo "<h2> Välkommen till din profil $userName! </h2>  <h3> Här ser du alla dina beställninar: </h3>"
?>
<?php


// Denna funktionen fungerar inte för tillfället.
function orderDone($userName){
    
    $sql = "UPDATE v5_order SET deliveryDate = current_date() WHERE customerID = '$userName'";
    mysqli_query ($connection, $sql) 
    or die ("Error querying database"); 
   echo $userName;
}

if(isset($_POST['submit']))
{
   orderDone();
} 

$sqlOrder = "SELECT * FROM v5_order WHERE customerID = '$userName'";
$result = $connection->query($sqlOrder);
$row = $result->fetch_assoc();
   
foreach($result as $item ){
   
    echo "<div class= 'orderDiv'></h2>";
    echo "<table border='1px solid' style='width:80%'> <tr> <th> Namn: </th> <th> Beställning gjord: </th> <th> Beställning skickad: </th> <th> Total pris: </th> <th> Fraktalternativ: </th>";
    echo "<tr>";
    echo  '<td>'.$item['customerID'].'</td>';
    echo  '<td>'.$item['orderDate'].'</td>';
    echo  '<td>'.$item['shippedDate'].'</td>';
    echo  '<td>'.$item['totalPrice'].'</td>';
    echo  '<td>'.$item['deliveryName'].'</td>';
    echo  "<td><form method='post' action ='profile.php'> <input type='submit' value='Mottagen beställning' name='submit'></td>";

    echo "</tr>";
    echo " </table> </div>";

}

?>
</div>

<?php
require 'sections/footer.php';

?>