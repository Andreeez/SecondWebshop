<?php

$dbsettings = parse_ini_file('./database.ini');

$connection = mysqli_connect($dbsettings['address'], $dbsettings['username'], $dbsettings['password'], $dbsettings['dbname']);

