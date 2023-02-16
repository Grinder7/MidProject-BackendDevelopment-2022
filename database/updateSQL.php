<?php

$db_name = "mid_project";
$db_username = "root";
$db_password = "";
$db_host = "localhost";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("ERROR: Cannot connect to database on server using username(" . mysqli_connect_errno() . ", " . mysqli_connect_error() . ")");
}

$data = json_decode(file_get_contents("php://input"), true);
if ($data != null) {
    $tid = $data["tid"];
    if ($data["type"] == "res") {
        $sql = "UPDATE `tasks` SET status = 0 WHERE tid = $tid";
    } else if ($data["type"] == "don") {
        $sql = "UPDATE `tasks` SET status = 1 WHERE tid = $tid";
    } else if ($data["type"] == "del") {
        $sql = "DELETE FROM `tasks` WHERE tid = $tid";
    }
    // echo($sql);
    $result = mysqli_query($conn, $sql);
    if ($result) {
        mysqli_close($conn);
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}