<?php

$table = "v5_newsemaillist";  
$tableNewsemail ="v5_newsemail";
$from ='defemvise@live.se';// Vilken adress mailet ska skickas från.


$subject= $_POST['subject']; 
$bodytext= $_POST['bodytext']; 

include './connect/connect.php';

$sqlGetSubscribers= "SELECT * FROM $table"; 


$result= mysqli_query ($connection, $sqlGetSubscribers)
or die ('Error querying database.'); 

while ($row = mysqli_fetch_array($result)) { 
    $name= $row['name']; 
    $email= $row['email']; 

    $msg= "Hej $name,\n$bodytext"; 
    mail($email, $subject, $msg, $from); 
    echo 'Email sent to: ' . $email. '<br>'; 
    } 

    $sqlNewsletterEmail = "INSERT INTO $tableNewsemail  ". "VALUES ('$subject', '$bodytext')"; 
    $resulttwo= mysqli_query ($connection, $sqlNewsletterEmail)
    or die ('Error querying database.'); 
    

    mysqli_close($connection); 
?>  