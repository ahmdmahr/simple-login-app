<?php
  include 'dbconnect.php';
  session_start();
  if(!isset($_SESSION['valid'])){
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="style.css" rel="stylesheet">
    </link>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="index.php">Logo</a>
        </div>
        <div class="right-links">
            <a href="edit.php">Edit Profile</a>
            <a href="logout.php">
                <button class="btn">
                    Log Out
                </button>
            </a>
        </div>
    </div>
    <main>
        <div class="main-box">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $_SESSION['username'] ?></b>, Welcome.</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $_SESSION['email'] ?></b>.</p>
                </div>
                <div class="box">
                    <p>And you are <b><?php echo $_SESSION['age'] ?></b> Years old.</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>