<?php

    include 'config.php';

    error_reporting(0);
    session_start();

    if(isset($_SESSION["username"])){
        header("Location: index.php");
    }
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0) 
        {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row ['username'];
        header("Location: index.php");
        }else 
        {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" media="all" href="css/app.css">
    </head>
    <body>
        <div class="page page_login">
          <form class="form" action="" method="POST">
            <div class="form__container">
              <div class="logo"><img class="logo__pic" src="img/logo.svg" width="45"></div>
              <div class="fieldset">
                <div class="field"><input class="input" type="email" placeholder="E-mail address" name="email" value="<?php echo $email; ?>" required></div>
                <div class="field"><input class="input" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required></div>
              </div><button name="submit" class="btn">Sign in</button>
              <div class="text">Don't Have an Account? <a href="register.php">Create it</a>.</div>
            </div>
          </form>
          <div class="about">Website template by ⚡ <a href="https://niceverynice.com">Nice, Very Nice</a></div>
        </div>
    </body>
</html>
