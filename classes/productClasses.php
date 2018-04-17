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
                $this->stock = $row['stock'];
        }
       
        function printProductPage(){  
            echo "<div class='containerProductPage'>";          
            echo "<img src='./images/movies/" . $this->id . ".jpg' alt='" . $this->title . "'></br>";
            
            echo "<div class='productInfo'>";
            echo "<p>". $this->title . " (" . $this->year .")</p>";
            if($this->stock == 0){
                echo "<th><p style='color:red;'>Slut i lager</p></th>";
            } elseif($this->stock < 6) {
                echo "<th><p style='color:orange;'>Fåtal i lager</p></th>";
            }elseif($this->stock > 5) {
            echo "<th><p style='color:green;'>I lager</p></th>";
            }
            echo "<form action='' method='POST'><button class='addToCartButton' name='addToCart' value='". $this->id ."' type='submit'>Lägg till i kundvagn</button></form>";
            echo "<p>". $this->price ."kr</p>";
            echo "<p class='descriptionText'>". $this->description ."</p>";
            echo "</div>";
            echo "</div>";
        }

        function printCartProduct($key){
            echo "<tr class='row1'><td><img class='cartImage' src='./images/movies/" . $this->id . ".jpg' alt='" . $this->title . "'></td>";
            echo "<th>" . $this->title . " (" .$this->year .")</th>";
            echo "<th>" . $this->price . " kr </th>";
            echo "<th><form action='./shoppingCart.php' method='POST'><button id ='remove' name='removeFromCart' value='". $key ."' type='submit'>Ta bort</button></form></th></tr>";
        }

        // function calculateTotalPrice(){
        //     $cartTotalPrice += $this->price;
        //     echo $cartTotalPrice;
        // }







    }
