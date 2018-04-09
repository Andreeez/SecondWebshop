<?php define("webshopName", "The5Vise");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo webshopName; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../script/script.js"></script>
</head>
<body>

<div class="headerContainer">
    <div class="headerRow">
        <div class="headerItem" id="headerItem1">
        <h2 class="webshopLogo"><?php echo webshopName; ?></h2>
        </div>
        <div class="headerItem" id="headerItem2">
            <form class="searchForm">
                <input type="text" id="searchInput" name="searchProduct" placeholder="S Ö K   P R O D U K T"/>
            </form>
        </div>
        <div class="headerItem">
            <div class="headerItembox">
                <div class="headerItemRow" id="itemRow1">
                    <img src="../images/kontoSymbol.png" style="width:45px; height:40px; margin:auto"/>
                </div>
                <div class="headerItemRow">
                    <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <button type="submit" name="headerLogin">Logga in /</button>
                        <button type="submit" name="headerSignUp">Registera</button>
                    </form>
                </div>  
            </div>
        </div>

        <div class="headerItem">
            <img src="../images/shoppingbag.png" id="shopBagLogo" style="width:45px; height:40px;"/>
        </div>

    </div>
</div>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['headerLogin'])){
            header('location: index.php');
            }else{
               // die();
            }
        }
    ?>

