<?php
    include './connect/connect.php';
require './sections/header.php';
$userName = $_SESSION['user'];
?>

<?php
echo "<h2> Välkommen till din profil $userName! </h2>  <h3> Här ser du alla dina beställninar: </h3>"
?>
<?php




$sqlOrder = "SELECT * FROM v5_order WHERE customerID = '$userName'";

$result = $connection->query($sqlOrder);
$row = $result->fetch_assoc();
   
foreach($result as $item ){
   
    echo "<div class= 'orderDiv'></h2>";
    echo "<table border='1px solid' style='width:80%'> <tr> <th> Namn: </th> <th> Beställning gjord: </th> <th> Beställning skickad: </th> <th> Total pris: </th>";
    echo "<tr>";
    echo  '<td>'.$item['customerID'].'</td>';
    echo  '<td>'.$item['orderDate'].'</td>';
    echo  '<td>'.$item['shippedDate'].'</td>';
    echo  '<td>'.$item['totalPrice'].'</td>';
    echo  "<td><button> Order mottagen </button></td>";

    echo "</tr>";
    echo " </table> </div>";

}

?>


<?php
require 'sections/footer.php';

?>