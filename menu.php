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

  <div class="kotak" id="menu1">
    <h1 class="text-uppercase"><b>Hello,<?php echo " " . $_SESSION['name'] ?> </b></h1>
    <button class="btn btn-outline-primary" href="index.php" type="submit" style="width: 30%">Log Out</button>
  </div>

  <div class="kotak" id="menu2">
    <h1>Create Task</h1>
    <input type="text" placeholder="Name" class="inputN" name="taskName" \>
    <label style="margin-left : 4%; margin-right : 1%">Deadline : </label>
    <input type="date" placeholder="Deadline" class="inputN" name="deadline" \>
    <button class="btn btn-primary" type="submit" style="width: 30%">Create Task</button>
  </div>

  <div class="kotak" id="menu3">
    <h1>Ongoing Tasks</h1>

  </div>

  <div class="kotak" id="menu4">
    <h1>Finished Tasks</h1>

  </div>

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>