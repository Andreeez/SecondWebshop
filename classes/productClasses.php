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

            // echo "<button onclick='addToCartButton(" . $row['id'] . ")'>Lägg till i kundvagn</button>";
            
            echo "<form action='' method='POST'><button name='addToCart' value='". $row['id'] ."' type='submit'>Lägg till i kundvagn</button></form>";

            echo $row['price'] . " kr </br>" . $row['description'];
        }
    }
    class CartItem{
        public $id;
        public $key;
        function __construct($id, $key){
                $this->id = $id;
                $this->key = $key;
        }
       
        function printCartProduct(){
            global $connection;
            $sql = "SELECT * FROM v5_products where id = " . $this->id;
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();

            echo "<tr><td><img class='cartImage' src='./images/movies/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></td>";
            echo "<td>" . $row['title'] . " (" . $row['year'] .")</td>";
            echo "<td>" . $row['price'] . " kr </td>";
            echo "<td><form action='shoppingCart.php' method='POST'><button name='removeFromCart' value='". $this->key ."' type='submit'>Ta bort</button></form></td></tr>";
            
        }


    }
