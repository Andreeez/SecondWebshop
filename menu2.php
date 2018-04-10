<?php
include './connect/connect.php';
require './sections/header.php';
echo "Tjo<br>";


abstract class Menu {

    protected $id; 
    protected $name;

    public function __construct($id, $name){
        $this->setCat($id, $name);
    }

    private function setCat($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
//function print måste finnas i subklasserna med vad funktionen ska utföra
    abstract public function print($postName);

}

class MainCategories extends Menu {

    public function print($main){
        echo "<form method='POST'>";
        echo "<button name='". $main ."' value='". $this->id ."' type='submit'>";
        echo "$this->name";
        echo "</button>";
        echo "</form>";

    }

}


class SubCategories extends Menu {
    
        public function print($sub){
            echo "<form method='POST'>";
            echo "<button name='". $sub ."' value='". $this->id ."' type='submit'>";
            echo "$this->name";
            echo "</button>";
            echo "</form>";
    
        }
    
    }

    class showMoviesInCategory extends Menu {
        
            public function print($cat){
            
                global $connection;
                $sql = "SELECT * FROM v5_products where id = " . $this->id;
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
    
                echo $row['title'] . " (" . $row['year'] .")</br>";
                echo "<img src='./images/movies/" . $row['id'] . ".jpg' alt='" . $row["title"] . "'></br>";
                echo $row['price'] . " kr </br>";

                echo "<form method='POST'>";
                echo "<button name='". $cat ."' value='". $this->id ."' type='submit'>";
                echo "Till produktsida";
                //echo "$this->name";
                echo "</button>";
                echo "</form>";
        
            }
        
        }





global $connection;
$mainCategorySql = "SELECT * FROM v5_maincategory";
foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
     $newItem = new MainCategories($mainMenuItem['id'], $mainMenuItem['name']);
     $newItem->print('main');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['main'])){
        echo $_POST['main'];
        $id = $_POST['main'];

        $subCategorySql = "SELECT * FROM v5_SubCategory WHERE mainCategoryId = $id";
        echo "<button>Visa alla produkter</button>";
        foreach ($connection->query($subCategorySql) as $subMenuItem) {
             $newItem2 = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
             $newItem2->print('sub');
        }

    }

    if(isset($_POST['sub'])){
        echo $_POST['sub'];
        $id = $_POST['sub'];
        
        $productSql = "SELECT * FROM v5_Products WHERE subCategoryId = $id";
        foreach ($connection->query($productSql) as $productItem) {
             $newItem3 = new showMoviesInCategory($productItem['id'], $productItem['title']);
             $newItem3->print('cat');
        }

    }


    if(isset($_POST['cat'])){
        echo $_POST['cat'];
        $id = $_POST['cat'];
        
       /* $productSql = "SELECT * FROM v5_Products WHERE subCategoryId = $id";
        foreach ($connection->query($productSql) as $productItem) {
             $newItem3 = new showMoviesInCategory($productItem['id'], $productItem['title']);
             $newItem3->print('cat');
        }*/

    }


    //GÖR NÅGOT MED SUB OCH MAIN FÖR ATT DELA UPP 
    //print_r($_POST['main']);
/* foreach($_POST as $val)
    {
        print_r($_POST);
        $id = $val;
    //echo "The value of $val is ".$val[0];
    }

    echo $id;


    $subCategorySql = "SELECT * FROM v5_SubCategory WHERE mainCategoryId = $id";
    echo "<button>Visa alla produkter</button>";
    foreach ($connection->query($subCategorySql) as $subMenuItem) {
         $newItem2 = new Menu($subMenuItem['id'], $subMenuItem['name']);
         $newItem2->printCat('sub');
    }*/

}

/*
public function printCat($subormain){
    $subormain = $subormain;
    echo "<form method='POST'>";
    echo "<button name='". $subormain ."' value='". $this->id ."' type='submit'>";
    echo "$this->name";
    echo "</button>";
    echo "</form>";
}*/








