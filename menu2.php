<?php
include './connect/connect.php';
require './sections/header.php';
echo "Tjo<br>";


class Menu {

    protected $id; 
    protected $name;

    public function __construct($id, $name){
        $this->setCat($id, $name);
    }

    public function setCat($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
    public function printCat($subormain){
        $subormain = $subormain;
        echo "<form method='POST'>";
        echo "<button name='". $subormain ."' value='". $this->id ."' type='submit'>";
        echo "$this->name";
        echo "</button>";
        echo "</form>";
    }

}

global $connection;
$mainCategorySql = "SELECT * FROM v5_maincategory";
foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
     $newItem = new Menu($mainMenuItem['id'], $mainMenuItem['name']);
     $newItem->printCat('main');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //GÖR NÅGOT MED SUB OCH MAIN FÖR ATT DELA UPP 
    //print_r($_POST['main']);
    foreach($_POST as $val)
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
    }

}









