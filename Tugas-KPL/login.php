<?php 
session_start();

/*Nama  : Fina Maulidiyah N
  NIM   : 19051397034
  Prodi : D4 MI 19A*/

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
  // code...
}

require 'functions.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1 ) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"]) ) {

      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
    // code...
  }

  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="vieport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Halaman Login</title>

  <style type="text/css">
    body {
      background : #CCFFCC;
      background-repeat: no-repeat;
    }
    #card {
      background : #99FF99;
      border-radius: 8px;
      box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
      height: 400px;
      margin: 7rem auto 8rem auto;
      width: 375px;
    }

    #card-content {
      padding: 1px 25px;
    }

    h3 {
      margin-top: 30px;
      font-family: times new roman;
      font-weight: bold;
      letter-spacing: 2px;
    }

  </style>

</head>
<body>
  <div id="card">
    <div id="card-content">
      <h3 class="text-center">Login</h3>
      <hr>
      <form action="" method="POST">

        <?php if (isset($error)) : ?>
          <p style="color: red; font-style: italic;">username / password salah</p>
        <?php endif; ?>

        <div class="form-group">
          <label for="username">Username :</label>
          <input type="username" class="form-control" id="username" placeholder="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" class="form-control" id="password" placeholder="password" name="password">
        </div>
        <p style="color: blue;">Belum punya akun? <a style="font-style: italic;" href="registrasi.php">Registrasi</a> terlebih dahulu! </p>
        <div align="center" class="form-group">
          <button type="submit" name = "login" class="btn btn-primary">Login</button>
        </div>

      </form>
    </div>
  </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>