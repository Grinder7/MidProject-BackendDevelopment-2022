<?php

include "db_connect.php";

$result = mysqli_Query($conn, "SELECT * from `tasks` WhERE status = 0 AND uid = ". $_SESSION['uid'] ." ORDER BY deadline");
for($x = 0; $x < mysqli_num_rows($result); $x++){
    $arr[$x] = mysqli_fetch_assoc($result);
    if(isset($arr[$x])){
        echo('
        <tr>
            <th>' . $arr[$x]["task_name"] . '</th>
            <th>' . $arr[$x]["deadline"] . '</th>
            <th class = "text-center">
                <a role = "button" class = "me-2 text-reset doneButton">
                    <i class="fas fa-check"></i>
                </a>
                <a role = "button" class = "delButton">
                    <i class="fas fa-trash"></i>
                </a>
            </th>
        </tr>
        '); 
    }
}