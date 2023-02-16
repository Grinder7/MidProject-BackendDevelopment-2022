<?php

session_start();
// echo "<script>console.log('" . $_SESSION['name'] . "')</script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Tasks</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Personal Style -->
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <!-- Title -->
  <div class="kotak" id="menu1">
    <h1 class="text-uppercase"><b>Hello,
        <?php
        if (isset($_SESSION['name']))
          echo " " . $_SESSION['name'];
        else
          header("Location: ../index.php");
        ?>
      </b></h1>
    <a role="button" class="btn btn-outline-primary" href="./database/logout.php" style="width: 30%">Log Out</a>
  </div>


  <!-- Add Task -->
  <div class="kotak" id="menu2">
    <h1>Create Task</h1>
    <form action="./database/tasks.php" method="POST">
      <input type="text" placeholder="Name" class="inputN" name="taskName" \>
      <label style="margin-left : 4%; margin-right : 1%">Deadline : </label>
      <input type="date" placeholder="Deadline" class="inputN" name="deadline" \>
      <button class="btn btn-primary" type="submit" name="newTask" value="0" style="width: 30%" id="nTask">Create
        Task</button>
    </form>
  </div>


  <!-- Ongoing Task -->
  <div class="kotak" id="menu3">
    <h1>Ongoing Tasks</h1>
    <table style="width : 90%">
      <tr style="border: 2px solid #3b71ca">
        <th style="width : 68%">Name</th>
        <th style="width : 20%">Deadline</th>
        <th style="width : 12%">Action</th>
      </tr>
      <?php
      include("./database/taskOngoing.php")
        ?>
    </table>
  </div>


  <!-- Done Task -->
  <div class="kotak" id="menu4">
    <h1>Finished Tasks</h1>
    <table style="width : 90%">
      <tr style="border: 2px solid #3b71ca">
        <th style="width : 68%">Name</th>
        <th style="width : 20%">Deadline</th>
        <th style="width : 12%">Action</th>
      </tr>
      <?php
      include("./database/taskDone.php")
        ?>
    </table>
  </div>

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
    // let newTask = document.getElementById("nTask");
    // newTask.addEventListener("click", function(){
    //   var data = {
    //     statusButton: "addNewTask",
    //     taks_name: $taskName
    //   }
    //   fetch(

    //   )
    // })

    let rbutton = document.getElementsByClassName("restoreButton");
    for (let x = 0; x < rbutton.length; x++) {
      rbutton[x].addEventListener("click", () => {
        let data = {
          type : "res",
          tid : rbutton[x].getAttribute("value")
        };
        fetch("./database/updateSQL.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json; charset=utf-8",
          },
          body: JSON.stringify(data),
        })
          .then((response) => response.json())
          .then((data) => console.log(data), location.reload())
          .catch((error) => console.error(error))
      })
    }

    let dbutton = document.getElementsByClassName("doneButton");
    for (let x = 0; x < dbutton.length; x++) {
      dbutton[x].addEventListener("click", () => {
        let data = {
          type : "don",
          tid : dbutton[x].getAttribute("value")
        };
        fetch("./database/updateSQL.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json; charset=utf-8",
          },
          body: JSON.stringify(data),
        })
          .then((response) => response.json())
          .then((data) => console.log(data), location.reload())
          .catch((error) => console.error(error))
      })
    }

    let xbutton = document.getElementsByClassName("delButton");
    for (let x = 0; x < xbutton.length; x++) {
      xbutton[x].addEventListener("click", () => {
        let data = {
          type : "del",
          tid : xbutton[x].getAttribute("value")
        };
        let conf = confirm("Are you sure want to delete this taks?");
        if(conf){
          fetch("./database/updateSQL.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json; charset=utf-8",
            },
            body: JSON.stringify(data),
          })
            .then((response) => response.json())
            .then((data) => console.log(data), location.reload())
            .catch((error) => console.error(error))
            
        }
      })
    }
  </script>

</body>

</html>