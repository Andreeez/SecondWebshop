<?php
require './connect/connect.php';

// Vill slå ihop klasserna Product och CartItem senare
    class Product{
        public $id;
        function __construct($id){
            $this->id = $id;
        }

        function printProductPage(){
            global $connection;
            $sql = "SELECT * FROM v5_products where id = " . $this->id;
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();

            echo $row['title'] . " (" . $row['year'] .")</br>";
            echo "<img src='./images/movies/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></br>";
            echo "<button onclick='addToCartButton(" . $row['id'] . ")'>Lägg till i kundvagn</button>";
            echo $row['price'] . " kr </br>" . $row['description'];
        }
    }
    class CartItem{
        public $id;
        function __construct($id){
                $this->id = $id;
        }
       
        function printCartProduct(){
            global $connection;
            $sql = "SELECT * FROM v5_products where id = " . $this->id;
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();

            echo "<tr><td><img class='cartImage' src='./images/movies/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></td>";
            echo "<td>" . $row['title'] . " (" . $row['year'] .")</td>";
            echo "<td>" . $row['price'] . " kr </td>";
            //echo "<td><input type='hidden' name='delete_sku' value='$sku'></td>";
            echo "<td><button onclick='removeFromCartButton(" . $row['id'] . ")'>Ta bort</button></td>";
            
            
        }


    }
