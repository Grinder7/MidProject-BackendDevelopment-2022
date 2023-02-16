<?php

include "db_connect.php";

$sUID = $_SESSION['uid'];
$result = mysqli_Query($conn, "SELECT * from `tasks` WhERE status = 1 AND uid = ". $_SESSION['uid'] ." ORDER BY deadline");
for($x = 0; $x < mysqli_num_rows($result); $x++){
    $arr[$x] = mysqli_fetch_assoc($result);
    if(isset($arr[$x])){
        $tid[$x] = $arr[$x]["tid"];
        echo('
        <tr class = "text-decoration-line-through">
            <th>' . $arr[$x]["task_name"] . '</th>
            <th>' . $arr[$x]["deadline"] . '</th>
            <th class = "text-center">
            <i role = "button" class="fas fa-undo restoreButton" value = "'.$tid[$x].'"></i>
        </th>
        </tr>
        '); 
    }
}