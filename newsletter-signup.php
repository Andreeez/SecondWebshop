
<?php 
include './connect/connect.php';
 
$table = "v5_newsemaillist";  
 
$name= $_POST['name']; 
$email= $_POST['email']; 
  
  
// Connection to DBase  

 
 
$query= "INSERT INTO $table  ". "VALUES ('$name', '$email')"; 
 
mysqli_query ($connection, $query) 
or die ("Error querying database"); 
 
mysqli_close($connection); 

setcookie("newsletter", "$name", time()+30*24*60*60);

header ('Location: index.php')

?>


 


