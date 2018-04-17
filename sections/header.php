<?php 
include './connect/connect.php';
require './classes/menuClasses.php';
define("webshopName", "The5Vise");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php 
    echo webshopName; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="../script/script.js"></script>
</head>
<body>

<div class="headerContainer">
    <div class="headerRow">
        <div class="headerItem" id="headerItem1">
        <h2 class="webshopLogo"> <a class="webshopLogo" href="./index.php"><?php echo webshopName; ?></a></h2>
        </div>
        <div class="headerItem" id="headerItem2">
            <form method='POST' action='./menu.php' class="searchForm">
                <input type="text" id="searchInput" value='' name="searchProduct" placeholder="S ö k  p r o d u k t"/>
                <button type="submit" id="searchSym"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="headerItem">
            <div class="headerItembox">
                <div class="headerItemRow" id="itemRow1">

                <div class="customer">
                    <img src="../images/kontoSymbol.png" style="width:35px; height:35px; margin:auto"/>
                    <a class="customerName" href ='profile.php'><?php if(isset($_SESSION['user'])){
                        echo $_SESSION['user'];
                     }
                      ?>
                      </a>
                      </div>
                </div>
                <div class="headerItemRow">
                    <form method="GET">
                        <button type="submit" class="buttonHeader" id="login" name="headerLogin">Logga in</button>
                        <button type="submit" class="buttonHeader" id="logout" name="headerLogout">Logga ut</button>
                        <button type="submit" class="buttonHeader" id="signup"name="headerSignUp">Registera</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="headerItem">
            <a href="./shoppingCart.php">
                <img src="./images/ShoppingBag.png" id="shopBagLogo" style="width:45px; height:40px;"/>
            </a>
        </div>

    </div>
</div>
<div id="wrapper">
<?php 
    global $connection;
    $mainCategorySql = "SELECT * FROM v5_maincategory";
    echo "<div class='navbar'>";
    echo "<div class='kategoriNav'>";
    foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
        $newItem = new MainCategories($mainMenuItem['id'], $mainMenuItem['name']);
        $newItem->print('main');
    }
    echo "</div>";
    echo "<div class='omOss'>";
    echo "<a class='huvudKategoriButton' href='#' >Om oss</a>";
    echo "</div>";
    echo "</div>";
    ?>

    <?php

        //Antingen loggar in eller registrerar
        if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['headerLogin'])){
            header('location: ./login.php');
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['headerSignUp'])){
                header('location: ./signup.php');
            }
        }
        
        //Om kund är inloggad eller inte
        if(isset($_SESSION['user'])){
            echo "<script>
            $('#signup').hide();
            $('#login').hide();
            $('#logout').show();
            </script>";
        }else{
            echo "<script>
            $('#signup').show();
            $('#login').show();
            $('#logout').hide();
            </script>";
        }

         //Om admin är inloggad
        if(isset($_SESSION['admin'])){
            echo "<script>
            $('#signup').hide();
            $('#login').hide();
            $('#logout').show();
            </script>";
        }/*else{
            echo "<script>
            $('#signup').show();
            $('#login').show();
            $('#logout').hide();
            </script>";
        }*/
        
        //Loggar ut kund/admin
        if(isset($_GET["headerLogout"])){
            session_destroy();
            echo "<script>
            $('#signup').show();
            $('#login').show();
            $('#logout').hide();
            </script>";
           
            header('location: ./index.php');

        }

    ?>
