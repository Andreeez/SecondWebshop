<?php

abstract class Menu {
    
        protected $id; 
        protected $name;
    
        public function __construct($id, $name){
    
            $this->id = $id;
            $this->name = $name;
        }
    //function print måste finnas i subklasserna med vad funktionen ska utföra
        abstract public function print($postName);
    
    }
    //skriver ut huvudkategorierna
    class MainCategories extends Menu {
    
        public function print($main){
            echo "<form action='./menu.php' method='POST'>";
            echo "<button class='huvudKategoriButton' name='". $main ."' value='". $this->id ."' type='submit'>";
            echo "$this->name";
            echo "</button>";
            echo "</form>";
    
        }
    
    }
    
    //skriver ut underkategorierna
    class SubCategories extends Menu {
        
            public function print($sub){
                echo "<form method='POST'>";
                echo "<button class='subButton' name='". $sub ."' value='". $this->id ."' type='submit'>";
                echo "$this->name";
                echo "</button>";
                echo "</form>";
        
            }
        
        }
    //skriver ut alla filmer till en viss kategori
        class showMoviesInCategory extends Menu {
        
                public function print($cat){

                    global $connection;
                    $sql = "SELECT * FROM v5_products where id = " . $this->id;
                    $result = $connection->query($sql);
                    $row = $result->fetch_assoc();

                    echo "<div class='movieCardDiv'>";
    
                    echo "<form action='./product.php' method='GET'>";
                    echo "<input type='image' class='kategoriImg'  src='./images/movies/" . $row['id'] . ".jpg' alt='Submit Form' name='". $cat ."' value='". $this->id ."' />";
                    echo "<input type='hidden' name='". $cat ."'  value='". $this->id ."' />";
                    echo "</form>";
                    echo $row['title'] . "<p class='movieYear'>-" . $row['year'] ."</p>";
                    echo "<p>" .$row['price'] . " kr </p>";
                    echo "</div>";
            
                }
            }

?>