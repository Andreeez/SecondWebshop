<?php
    session_start();    
    require './connect/connect.php';

     class Product{
        public $id;
        function __construct($id){
             $this->id = $id;
        }

        function printProduct(){
            global $connection;
            $sql = "SELECT * FROM v5_products where id = " . $this->id;
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            echo $row['title'] . " (" . $row['year'] .")</br>";
            echo "<img src='./images/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></br>";
            echo $row['price'] . " kr </br>" . $row['description'];
            
        }


      }


  

    $myProduct = new Product(5);
    $myProduct->printProduct();

?>