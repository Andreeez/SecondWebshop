
<?php

include './connect/connect.php';

$title= $_POST['title']; 
$number= $_POST['stock'];  
$table = "v5_products";  





$sqlUpdateStock= "UPDATE $table SET stock = stock + $number WHERE title = $title";

mysqli_query ($connection, $sqlUpdateStock) 
or die ("Error querying database"); 

mysqli_close($connection); 

?>