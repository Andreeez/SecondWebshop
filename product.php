<?php
    session_start();    
    require './sections/header.php';
    require './classes/productClasses.php';
     

    $productPage = new Product(5);
    $productPage->printProductPage();

    
?>

</body>
</html> 