<?php

include "./db_connect.php";

$data = json_decode(file_get_contents("php://input"));
if (isset($data)) {
    $tid = $data["tid"];
    if ($data["type"] == "res") {
        $sql = "UPDATE `tasks` SET status = 0 WHERE tid = $tid";
    } else if ($data["type"] == "don") {
        $sql = "UPDATE `tasks` SET status = 1 WHERE tid = $tid";
    } else if ($data["type"] == "del") {
        $sql = "DELETE `tasks` WHERE tid = $tid";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        mysqli_close($conn);
        echo json_encode(["status" => "success", "message" => "Data updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "No data found"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No data found"]);
}
