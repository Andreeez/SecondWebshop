<?php
session_start();    
include './connect/connect.php';
echo "Tjo";



class MenuItem {

    function printMainCategoryItem(){
        global $connection;
        $mainCategorySql = "SELECT name FROM v5_maincategory";
        $result = $connection->query($mainCategorySql);
        if($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo $row["name"];
            }
        } else {
            // echo false;
            echo "0 Results";
        }
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