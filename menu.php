<?php
include './connect/connect.php';
require './classes/menuClasses.php';

global $connection;
$mainCategorySql = "SELECT * FROM v5_maincategory";
echo "<div class='navbar'>";
echo "om oss";
foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
    echo "<div class='dropdown'>";
     $newItem = new MainCategories($mainMenuItem['id'], $mainMenuItem['name']);
     $newItem->print('main');
}
echo "</div>";
$subCategorySql = "SELECT * FROM v5_SubCategory WHERE mainCategoryId = 1 ORDER BY name";
//echo "<div class='subCategoriesDiv'>";
echo "<div class='dropdown-content'>";
echo "<button>Visa alla produkter</button>";
foreach ($connection->query($subCategorySql) as $subMenuItem) {
     $newItem2 = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
     $newItem2->print('sub');
}
echo "</div>";
echo "</div>";
echo "</div>";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['main'])){
        //echo $_POST['main'];
        $id = $_POST['main'];

        $subCategorySql = "SELECT * FROM v5_SubCategory WHERE mainCategoryId = $id ORDER BY name";
        //echo "<div class='subCategoriesDiv'>";
        echo "<div class='dropdown-content'>";
        echo "<button>Visa alla produkter</button>";
        foreach ($connection->query($subCategorySql) as $subMenuItem) {
             $newItem2 = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
             $newItem2->print('sub');
        }
        echo "</div>";
        echo "</div>";
        //echo "</div>";

    }

    if(isset($_POST['sub'])){
        //echo $_POST['sub'];
        $id = $_POST['sub'];
        
        $productSql = "SELECT * FROM v5_Products WHERE subCategoryId = $id OR subCategoryId2 = $id";
        echo "<div class='showMoviesDiv'>";
        foreach ($connection->query($productSql) as $productItem) {
             $newItem3 = new showMoviesInCategory($productItem['id'], $productItem['title']);
             $newItem3->print('cat');
        }
        echo "</div>";

    }


}









