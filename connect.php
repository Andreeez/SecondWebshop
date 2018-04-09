<?php

$dbsettings = parse_ini_file('./database.ini');

$connection = mysqli_connect($dbsettings['address'], $dbsettings['username'], $dbsettings['password'], $dbsettings['dbname']);

$sql = "SELECT name FROM V5_SubCategory";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> namn: ". $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}

?>
