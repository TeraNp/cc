<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <title>Berhasil Login</title>
</head>
<body>
   <div class="page">
      <form class="form" action="" method="POST">
        <div class="form__container">
          <div class="fieldset">
            <div class="text">Selamat Datang, <?php echo $_SESSION['username'] ?></div>
        </div>
            <div class="form__footer"><a href="logout.php">Logout</a>.</div>
      </form>
    </div>
</body>
</html>