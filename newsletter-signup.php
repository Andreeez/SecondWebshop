
<?php 
include './connect/connect.php';
 
$table = "v5_newsemaillist";  
 
$name= $_POST['name']; 
$email= $_POST['email']; 
  
  
// Connection to DBase  

 
 
$sqlAddSubscriber= "INSERT INTO $table  ". "VALUES ('$email', '$name')"; 
 
mysqli_query ($connection, $sqlAddSubscriber) 
or die ("Error querying database"); 
 
mysqli_close($connection); 

setcookie("newsletter", "$name", time()+30*24*60*60);

header ('Location: index.php')

?>


 


