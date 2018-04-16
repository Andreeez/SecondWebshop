
<?php
<<<<<<< HEAD
include './connect/connect.php';
require './sections/header.php';
=======
include 'connect/connect.php';
require 'sections/header.php';
>>>>>>> 18fb56407ee7a7e383a079d8f6464d7c3c3b24ad

?>


<div class ="hejhej">
<?php

if(isset($_SESSION['user'])){
    echo $_SESSION['user'];
}


?>

    <div class="back"><h1>VÄLKOMMEN TILL <?php echo webshopName; ?></h1</div>
</div>

<?php
require 'sections/footer.php';

?>