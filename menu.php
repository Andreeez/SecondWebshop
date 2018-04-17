<?php
include './connect/connect.php';
include './sections/header.php';

?>
<div id="container">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   

/*Tittar om något ligger i POST(main), har knappen klickats på skickas det med ett id */
    if(isset($_POST['main'])){
        $id = $_POST['main'];
       
        /*query för att få ut underkategorierna, alla genre. Loopar igenom och skapar nya objektinstanser genom klassen SubCategories*/
        $subCategorySql = "SELECT * FROM v5_subcategory WHERE mainCategoryId = $id ORDER BY name";
        echo "<div class='subCategoriesDiv'>";

        foreach ($connection->query($subCategorySql) as $subMenuItem) {
             $newSubMenuItem = new SubCategories($subMenuItem['id'], $subMenuItem['name']);
             $newSubMenuItem->print('sub');
        }
        echo "</div>";

        //Använder klassen ShowMoviesInCategory för att skriva ut alla produkter när man trycker på en huvudkategori  
        $showAllmoviesSql = "SELECT * FROM v5_products WHERE mainCategoryId = $id ORDER BY title ";
        echo "<div class='showMoviesDiv'>";
        foreach ($connection->query($showAllmoviesSql) as $movieItem) {
            $newMovieItem = new ShowMoviesInCategory($movieItem['id'], $movieItem['title']);
            $newMovieItem->print('cat');
       }
       echo "</div>";
    }

/*Tittar om något ligger i POST(sub), har knappen klickats på skickas det med ett id(id för den underkategori som tryckts) */
    if(isset($_POST['sub'])){
        $id = $_POST['sub'];

        /*nedan skriver ut underkategorimenyn en gång till*/
        $subCategorySql = "SELECT * FROM v5_subcategory ORDER BY name ASC";
        $result = $connection->query($subCategorySql);
        echo "<div class='subCategoriesDiv'>";
        foreach ($connection->query($subCategorySql) as $subItem) {
            $newSubMenuItem2 = new SubCategories($subItem['id'], $subItem['name']);
            $newSubMenuItem2->print('sub');
       }
       echo "</div>";


       //Skriver ut den valda genren på sidan när du tryckt på en underkategori
        $categoryNameSql = "SELECT name FROM v5_subcategory WHERE id = $id";
        $result = $connection->query($categoryNameSql);
        
                if ($result->num_rows > 0) {
                        
                    while($row = $result->fetch_assoc()) {
                            echo $row["name"];
                    }
                } 
                    


        //Använder oss av klassen ShowMoviesInCategory för att skriva ut alla filmer när man tryckt på en viss genre
        $productSql = "SELECT * FROM v5_products WHERE subCategoryId = $id OR subCategoryId2 = $id";
        echo "<div class='showMoviesDiv'>";
        foreach ($connection->query($productSql) as $productItem) {
             $newProductItem = new ShowMoviesInCategory($productItem['id'], $productItem['title']);
             $newProductItem->print('cat');
        }
        echo "</div>";

    }


}

require './sections/footer.php';









