<?php
  include 'dbconnect.php';
  session_start();
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $verify_query = $db->prepare("SELECT * FROM users WHERE email='$email' AND password='$password'");
    $verify_query->execute();
    $a = $verify_query->fetchAll();
    if(empty($a)){
        echo "<p>Wrong username or password</p> <br>";
       echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
    }
    else{
        $row = $a[0];
        // var_dump($row);
        $_SESSION['valid'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['password'] = $row['password'];
        header("Location: index.php");
    }
  }
  else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet"></link>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <h3>Login</h3>
            <form action="" method="POST">
                <div class="field input">
                    <label for="email">Email:</label>
                    <input type="text" name="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password:</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Submit">
                </div>
                <div class="link">
                    Don't have account? <a href="signup.php">Sign Up Now.</a>
                </div>
            </form>
        </div>
    </div>
    <?php }?>
</body>
</html>
