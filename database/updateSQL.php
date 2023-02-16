<?php

include "./db_connect.php";

if($data["type"] == "res"){
    $sql = "UPDATE `tasks` SET status = 0 WHERE tid = ";
}
else if($data["type"] == "don"){
    $sql = "UPDATE `tasks` SET status = 1 WHERE tid = ";
}
else if($data["type"] == "del"){
    $sql = "DELETE `tasks` where tid = ";
}
mysqli_query($conn, $sql);