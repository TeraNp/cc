<?php
  include 'config.php';
  error_reporting(0);

  session_start();

  if(isset($_SESSION['username'])){
    header("Location: login.php");
  }
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
      $sql = "SELECT * FROM users WHERE email='$email";
      $result = mysqli_query($conn, $sql);
      if(!$result ->num_rows > 0 ) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "<script>alert('Selamat, registrasi berhasil!')</script>";
          $username = "";
          $email= "";
          $_POST['password'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Page description">
    <!--Twitter Card data-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Page Title">
    <meta name="twitter:description" content="Page description less than 200 characters">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="http://www.example.com/image.jpg">
    <!--Open Graph data-->
    <meta property="og:title" content="Title Here">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://www.example.com/">
    <meta property="og:image" content="http://example.com/image.jpg">
    <meta property="og:description" content="Description Here">
    <meta property="og:site_name" content="Site Name, i.e. Moz">
    <meta property="fb:admins" content="Facebook numeric ID">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="css/app.css">
  </head>
  <body>
    <div class="page">
      <form class="form" action="" method="POST">
        <div class="form__container">
          <div class="logo"><img class="logo__pic" src="img/logo.svg" width="45"></div>
          <div class="fieldset">
            <div class="field"><input class="input" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required></div>
            <div class="field"><input class="input" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required></div>
            <div class="field"><input class="input" type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required></div>
          </div><button name="submit" class="btn">Sign up</button>
        </div>
        <div class="form__footer">Already have an account? <a href="login.php">Log in</a>.</div>
      </form>
      <div class="about">Website template by ??? <a href="https://niceverynice.com">Nice, Very Nice</a></div>
    </div>
  </body>
</html>
