<?php
include './connect/connect.php';
//include './classes/menuClasses.php';
include './sections/header.php';

/*global $connection;
$mainCategorySql = "SELECT * FROM v5_maincategory";
echo "<div class='navbar'>";
foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
     $newItem = new MainCategories($mainMenuItem['id'], $mainMenuItem['name']);
     $newItem->print('main');
}
echo "<a href='#' >Om oss</a>";
echo "</div>";*/
/*$subCategorySql = "SELECT * FROM v5_SubCategory WHERE mainCategoryId = 1 ORDER BY name";
//echo "<div class='subCategoriesDiv'>";
echo "<button>Visa alla produkter</button>";
foreach ($connection->query($subCategorySql) as $subMenuItem) {
     $newItem2 = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
     $newItem2->print('sub');
}
*/
?>
<div id="container">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    global $connection;

    if(isset($_POST['main'])){
        //echo $_POST['main'];
        $id = $_POST['main'];
 global $connection;
        $subCategorySql = "SELECT * FROM v5_subcategory WHERE mainCategoryId = $id ORDER BY name";
        echo "<div class='subCategoriesDiv'>";

        foreach ($connection->query($subCategorySql) as $subMenuItem) {
             $newItem2 = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
             $newItem2->print('sub');
        }
        echo "</div>";
        //echo "</div>";

        $showAllmoviesSql = "SELECT * FROM v5_products WHERE mainCategoryId = $id ORDER BY title ";
        echo "<div class='showMoviesDiv'>";
        foreach ($connection->query($showAllmoviesSql) as $movieItem) {
            $newItem4 = new ShowMoviesInCategory($movieItem['id'], $movieItem['title']);
            $newItem4->print('cat');
       }
       echo "</div>";
    }

    if(isset($_POST['sub'])){
        //echo $_POST['sub'];
        $id = $_POST['sub'];

        /*nedan skriver ut menyn en gång till*/
        $categoryNameSql = "SELECT * FROM v5_subcategory ORDER BY name ASC";
        $result = $connection->query($categoryNameSql);
        echo "<div class='subCategoriesDiv'>";
        foreach ($connection->query($categoryNameSql) as $catItem) {
            $newItem4 = new SubCategories($catItem['id'], $catItem['name']);
            $newItem4->print('sub');
       }
       echo "</div>";



        /*$categoryNameSql = "SELECT name FROM v5_subcategory WHERE id = $id";
        $result = $connection->query($categoryNameSql);
        
                if ($result->num_rows > 0) {
                        
                    while($row = $result->fetch_assoc()) {
                            echo $row["name"];
                    }
                } */
                    


        
        $productSql = "SELECT * FROM v5_products WHERE subCategoryId = $id OR subCategoryId2 = $id";
        echo "<div class='showMoviesDiv'>";
        foreach ($connection->query($productSql) as $productItem) {
             $newItem3 = new showMoviesInCategory($productItem['id'], $productItem['title']);
             $newItem3->print('cat');
        }
        echo "</div>";

    }


}

require './sections/footer.php';









