<?php
  include 'dbconnect.php';
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $verify_query = $db->prepare("SELECT email FROM users WHERE email='$email'");
    $verify_query->execute();
    if(!empty($verify_query->fetchAll())){
        echo "<p>This email is used, Try another one plz!</p> <br>";
       echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
    }
    else{
        $add = $db->prepare("INSERT INTO users(username,email,age,password) VALUES('$username','$email','$age','$password')");
        $add->execute();

        echo "<p>Registration is done.</p> <br>";
       echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
    }
  }
  else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="style.css" rel="stylesheet"></link>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <h3>Sign Up</h3>
            <form action="" method="POST">
                <div class="field input">
                    <label for="username">Username:</label>
                    <input type="text" name="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email:</label>
                    <input type="text" name="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age:</label>
                    <input type="number" name="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password:</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn register-btn" name="submit" value="Submit">
                </div>
                <div class="link">
                   Already a member? <a href="login.php">Sign In.</a>
                </div>
            </form>
        </div>
    </div>
    <?php }?>
</body>
</html>
