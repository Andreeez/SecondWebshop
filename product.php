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
            $sql = "SELECT title FROM v5_products where id = " . $this->id;
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            echo "<br> namn: ". $row["title"]. "<br>";
        }


      }


  

    $myProduct = new Product(4);
    $myProduct->printProduct();

?>