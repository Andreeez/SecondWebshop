<?php
require './connect/connect.php';

    class Product{
        public $id;
        
        

        function __construct($id){
                $this->id = $id;

                global $connection;
                $sql = "SELECT * FROM v5_products where id = " . $this->id;
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();

                $this->title = $row['title'];
                $this->price = $row['price'];
                $this->year = $row['year'];
                $this->description = $row['description'];
        }
       
        function printProductPage(){            
            echo $this->title . " (" . $this->year .")</br>";
            echo "<img src='./images/movies/" . $this->id . ".jpg' alt='" . $this->title . "'></br>";
            echo "<form action='' method='POST'><button name='addToCart' value='". $this->id ."' type='submit'>Lägg till i kundvagn</button></form>";
            echo $this->price . " kr </br>" . $this->description;
        }

        function printCartProduct($key){
            echo "<tr><td><img class='cartImage' src='./images/movies/" . $this->id . ".jpg' alt='" . $this->title . "'></td>";
            echo "<td>" . $this->title . " (" .$this->year .")</td>";
            echo "<td>" . $this->price . " kr </td>";
            echo "<td><form action='./shoppingCart.php' method='POST'><button name='removeFromCart' value='". $key ."' type='submit'>Ta bort</button></form></td></tr>";
        }

        // function calculateTotalPrice(){
        //     $cartTotalPrice += $this->price;
        //     echo $cartTotalPrice;
        // }







    }
