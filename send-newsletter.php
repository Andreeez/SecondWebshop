<?php

$table = "v5_newsemaillist";  
$tabletwo ="v5_newsemail";
$from ='defemvise@live.se';// Vilken adress mailet ska skickas från.


$subject= $_POST['subject']; 
$bodytext= $_POST['bodytext']; 

include './connect/connect.php';

$query= "SELECT * FROM $table"; 


$result= mysqli_query ($connection, $query)
or die ('Error querying database.'); 

while ($row = mysqli_fetch_array($result)) { 
    $name= $row['name']; 
    $email= $row['email']; 

    $msg= "Hej $name,\n$bodytext"; 
    mail($email, $subject, $msg, $from); 
    echo 'Email sent to: ' . $email. '<br>'; 
    } 

    $querytwo = "INSERT INTO $tabletwo  ". "VALUES ('$subject', '$bodytext')"; 
    $resulttwo= mysqli_query ($connection, $querytwo)
    or die ('Error querying database.'); 
    

    mysqli_close($connection); 
?>  