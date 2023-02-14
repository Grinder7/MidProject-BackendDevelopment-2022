<?php

$db_name = "mid_project";
$db_username = "root";
$db_password = "";
$db_host = "localhost";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("ERROR: Cannot connect to database $dbname on server $dbhost using username $dbuser(" . mysqli_connect_errno() . ", " . mysqli_connect_error() . ")");
}
