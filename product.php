<?php
    session_start();    
    require './sections/header.php';
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
            echo "<button onclick='addToCartButton(" . $row['id'] . ")'>Lägg till i kundvagn</button>";
            echo $row['price'] . " kr </br>" . $row['description'];
            
        }


      }


  

    $myProduct = new Product(5);
    $myProduct->printProduct();

    
?>

</body>
</html> 