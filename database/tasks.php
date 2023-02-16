<?php

session_start();

include "db_connect.php";

// Add Task

if(isset($_POST['newTask'])){
    $taskName = $_POST['taskName'];
    $deadline = $_POST['deadline'];
    $status = 0;
    $UID = $_SESSION['uid'];
    $userQuery = "INSERT INTO tasks (task_Name, deadline, status, uid) value('$taskName', '$deadline', '$status', '$UID')";
    $result = mysqli_query($conn, $userQuery);
    if($result){
        mysqli_close($conn);
        header('Location: ../menu.php');
    }
    
}
