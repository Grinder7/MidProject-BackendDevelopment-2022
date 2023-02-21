<?php
session_start();
include"db_connect.php";
$sqli = "DELETE FROM `tasks` WHERE uid = ". $_SESSION['uid'] ."";
mysqli_query($conn, $sqli);
$sqli = "DELETE FROM `account` WHERE uid = ". $_SESSION['uid'] ."";
mysqli_query($conn, $sqli);
include"logout.php";