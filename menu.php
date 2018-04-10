<?php
session_start();    
include './connect/connect.php';
echo "Tjo";



class MenuItem {

    function printMainCategoryItem(){
        global $connection;
        $mainCategorySql = "SELECT * FROM v5_maincategory";
        foreach ($connection->query($mainCategorySql) as $mainMenuItem) {
            
            echo "<form method='POST'>";
            echo "<button name='". $mainMenuItem['id'] ."' type='submit'>";
            echo $mainMenuItem['name'];
            echo "</button>";
            echo "</form>";
            $testId = $mainMenuItem['id'];
            //echo $mainMenuItem['id'];
        }

        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            foreach ($connection->query($mainCategorySql) as $mainMenuId)

            if(isset($_POST[$mainMenuId['id']])){
            //if(isset($_POST[$mainMenuItem['id']])){
                echo $mainMenuId['id'];
                //echo $testId;
                //$newAdmin->getAllMembers();
        
            }


           /* if(isset($_POST['2'])){
                echo "trycktmysik";
            }*/

        }
       
        /*$result = $connection->query($mainCategorySql);
        if($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo $row["name"];
            }
        } else {
            // echo false;
            echo "0 Results";
        }*/
    }

}

$myMenuItem = new MenuItem();
$myMenuItem->printMainCategoryItem();


// $myMenuItem->printMainCategoryItem();





// function printMainCategoryItem(){
//         global $connection;
//         $mainCategorysql = "SELECT name FROM v5_maincategory";
//         $result = $connection->query($mainCategorysql);
//         $row = $result->fetch_assoc();
//         $printList = $row["name"];

//         echo "<li .$this->printSubCategoryItem()'>$printList</li>";
//         // echo $printList;
//         // return $printList;
//         // onClick='".$this->onClickCode()
//     }

//     printMainCategoryItem();

//     function printSubCategoryItem(){
//         global $connection;
//         $mainSubCategorySql = "SELECT name FROM v5_subcategory";
//         $result = $connection->query($mainSubCategorySql);
//         if($result -> num_rows > 0) {
//             while($row = $result->fetch_assoc()){
//                 echo $row["name"];
//             }
//         } else {
//             echo false;
//             // echo "0 Results";
//         }
//     }





//  class MenuItems{
    // public $id;
    // function __construct($id){
    //      $this->id = $id;
    // }
    // function printMainCategoryItem(){
    //     global $connection;
        // $mainCategorysql = "SELECT name FROM v5_maincategory where id = " . $this->id;
        // $mainCategorysql = "SELECT name FROM v5_maincategory";

        // $result = $connection->query($mainCategorysql);
        // $row = $result->fetch_assoc();
        // $printList = $row["name"];

        // echo "<li onclick='printSubCategoryItem()'>$printList</li>";
        // echo "<li onClick='".$this->printSubCategoryItem()."'>$printList</li>";
        
        // onClick='".$this->onClickCode()

        // echo $printList;

    // }

//     function printSubCategoryItem(){
//         global $connection;
//         $mainSubCategorySql = "SELECT name FROM v5_subcategory";
//         $result = $connection->query($mainSubCategorySql);
//         if($result -> num_rows > 0) {
//             while($row = $result->fetch_assoc()){
//                 echo $row["name"];
//             }
//         } else {
//             echo false;
//             // echo "0 Results";
//         }
//     }
//   }


// $myMenuItem = new MenuItems(2);
// $myMenuItem->printMainCategoryItem();

// $myMenuItem->printSubCategoryItem();




?>