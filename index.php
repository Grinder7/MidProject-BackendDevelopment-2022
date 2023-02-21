<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: /menu.php");
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Log In</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Personal Style -->
    <link rel="stylesheet" href="./style.css" />
  </head>

  <body>
    <div class="text-center kotakf login" id="formLogin">
      <form action="./database/account.php" method="POST">

        <h1 class="mb-3"><b>LOG IN</b></h1>
        <?php
        if (isset($_GET['error'])) {
          echo ('<div class="alertError mb-3">' . $_GET['error'] . '</div>');
        } else if (isset($_GET['success'])) {
          echo ('<div class="alertSuccess mb-3">' . $_GET['success'] . '</div>');
        }
        ?>
        <input type="text" placeholder="Username" class="inputM" name="luname">
        <input type="password" placeholder="Password" class="inputM" name="lpass">

        <button type="submit" class="btn btn-outline-primary" style="width: 60%">Log in</button>
        <p class="mb-0">-------------------- or --------------------</p>
        <a class="btn btn-primary" role="button" style="width: 60%" id="btnRegister">Sign Up</a>
      </form>
    </div>
    <div class="text-center kotakf register" id="formRegister">
      <form action="./database/account.php" method="POST">
        <h1 class="mb-3"><b>REGISTER</b></h1>
        <input class="mt-1 inputM" type="text" placeholder="Name" name="rname" minlength = "1" maxlength = "20">
        <input class="mt-1 inputM" type="text" placeholder="Username" name="runame" minlength = "3" maxlength = "15">
        <input class="mt-1 inputM" type="password" placeholder="Password" name="rpass" minlength = "8" maxlength = "20">
        <input class="mt-1 inputM" type="password" placeholder="Confirm Password" name="rcpass" minlength = "8" maxlength = "20">

        <button class="btn btn-outline-primary mt-3" type="submit" style="width: 60%" onclick="location.href()">Sign Up</button>
        <p class="mb-0">-------------------- or --------------------</p>
        <a class="btn btn-primary" role="button" style="width: 60%" id="btnLogin">Log in</a>
      </form>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript">
      let flogin = document.getElementById("formLogin");
      let fregister = document.getElementById("formRegister");
      let btnLogin = document.getElementById("btnLogin");
      let btnRegister = document.getElementById("btnRegister");
      btnRegister.addEventListener("click", () => {
        flogin.style.display = "none";
        fregister.style.display = "inline-block";
      });
      btnLogin.addEventListener("click", () => {
        flogin.style.display = "inline-block";
        fregister.style.display = "none";
      });
    </script>
  </body>

  </html>
<?php
}
?>