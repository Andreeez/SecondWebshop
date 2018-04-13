
<?php

include './connect/connect.php';

$id= $_POST['id']; 
$number= $_POST['stock'];  
$table = "v5_products";  





$sqlUpdateStock= "UPDATE $table SET stock = stock + $number WHERE id = $id";

mysqli_query ($connection, $sqlUpdateStock) 
or die ("Error querying database"); 

mysqli_close($connection); 

?>  