
<?php 
$user = "root";  
$password = "password";  
$host = "127.0.0.1";  
$dbase = "de5vise";  
$table = "v5_newsemaillist";  
 
$name= $_POST['name']; 
$email= $_POST['email']; 
  
  
// Connection to DBase  
$dbc= mysqli_connect($host,$user,$password, $dbase)  
or die("Unable to select database"); 
 
 
$query= "INSERT INTO $table  ". "VALUES ('$name', '$email')"; 
 
mysqli_query ($dbc, $query) 
or die ("Error querying database"); 
 
mysqli_close($dbc); 

setcookie("newsletter", "$name", time()+30*24*60*60);

header ('Location: index.php')

?>


 


