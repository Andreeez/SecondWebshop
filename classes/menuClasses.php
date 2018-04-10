<?php

abstract class Menu {
    
        protected $id; 
        protected $name;
    
        public function __construct($id, $name){
            $this->setIdandName($id, $name);
        }
    
        private function setIdandName($id, $name){
            $this->id = $id;
            $this->name = $name;
        }
    //function print måste finnas i subklasserna med vad funktionen ska utföra
        abstract public function print($postName);
    
    }
    //skriver ut huvudkategorierna
    class MainCategories extends Menu {
    
        public function print($main){
            echo "<form method='POST'>";
            echo "<button name='". $main ."' value='". $this->id ."' type='submit'>";
            echo "$this->name";
            echo "</button>";
            echo "</form>";
    
        }
    
    }
    
    //skriver ut underkategorierna
    class SubCategories extends Menu {
        
            public function print($sub){
                echo "<form method='POST'>";
                echo "<button name='". $sub ."' value='". $this->id ."' type='submit'>";
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
                    echo $row['title'] . " (" . $row['year'] .")</br>";
                    echo "<img class='kategoriImg' src='./images/movies/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></br>";
                    echo $row['price'] . " kr </br>";
    
                    echo "<form method='POST'>";
                    echo "<button name='". $cat ."' value='". $this->id ."' type='submit'>";
                    echo "Till produktsida";
                    //echo "$this->name";
                    echo "</button>";
                    echo "</form>";
                    echo "</div>";
            
                }
            }

?>