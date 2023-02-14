<?php

include "db_connect.php";

if (isset($_POST['rname']) && isset($_POST['runame']) && isset($_POST['rpass']) && isset($_POST['rcpass'])) {
    $rname = $_POST['rname'];
    $runame = $_POST['runame'];
    $rpass = $_POST['rpass'];
    $rcpass = $_POST['rcpass'];
    if ($rpass != $rcpass) {
        header("Location: ../index.php?error=Password doesn't match");
    }
    $sql = "SELECT * FROM account WHERE username='$rname'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Can't connect to database");
    } else if (mysqli_num_rows($result) > 0) {
        header("Location: ../index.php?error=Username already exists");
    } else {
        $row = mysqli_fetch_assoc($result);
        $hashedPass = password_hash($rpass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO account (name, username, password) VALUES ('$rname', '$runame', '$hashedPass')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Can't connect to database");
        } else {
            header("Location: ../index.php?error=Account created successfully");
        }
    }
} else if (isset($_POST['luname']) && isset($_POST['lpass'])) {
    $luname = $_POST['luname'];
    $lpass = $_POST['lpass'];
    $sql = "SELECT * FROM account WHERE username='$luname'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Can't connect to database");
    } else if (mysqli_num_rows($result) == 0) {
        header("Location: ../index.php?error=Invalid username or password");
    } else {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);
        $checkPass = password_verify($lpass, $row['password']);
        if ($checkPass) {
            session_start();
            $_SESSION['uid'] = $row['uid'];
            $_SESSION["name"] = $row["name"];
            echo "Session started <br>";
            var_dump($row['name']);
            var_dump($_SESSION['name']);
            mysqli_close($conn);
            // die();
            header("Location: ../menu.php");
        } else {
            header("Location: ../index.php?error=Invalid username or password");
        }
    }
} else {

    header("Location: ../index.php?error=Please Login First, $luname, $lpass");
}
