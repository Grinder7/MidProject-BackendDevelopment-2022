<?php

$db_name = "mid_project";
$db_username = "root";
$db_password = "";
$db_host = "localhost";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("ERROR: Cannot connect to database on server using username(" . mysqli_connect_errno() . ", " . mysqli_connect_error() . ")");
}
