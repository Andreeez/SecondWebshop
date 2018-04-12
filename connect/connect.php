<?php

$dbsettings = parse_ini_file('./database.ini');

$connection = mysqli_connect($dbsettings['address'], $dbsettings['username'], $dbsettings['password'], $dbsettings['dbname']);

$sql = "SET NAMES utf8";
$result = $connection->query($sql);
