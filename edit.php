<?php
   include 'dbconnect.php';

   session_start();

   $id = $_SESSION['id'];


   if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $update = $db->prepare("UPDATE users SET username='$username',email='$email',age='$age' WHERE id='$id'");
    $update->execute();


    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['age'] = $age;


    echo "<p>Profile Updated</p> <br>";
    echo "<a href='index.php'><button class='btn'>Go Home</button></a>";

   }
   else{
    $qry = $db->prepare("SELECT * FROM users WHERE id='$id'");
    $qry->execute();
    $a = $qry->fetchAll();
    $row = $a[0];
    $cur_username = $row['username'];
    $cur_email = $row['email']; 
    $cur_age = $row['age'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="style.css" rel="stylesheet"></link>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="index.php">Logo</a>
        </div>
        <div class="right-links">
            <!-- <a href="#">Edit Profile</a> -->
            <a href="logout.php">
                <button class="btn">
                    Log Out
                </button>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <h3>Edit Profile</h3>
            <form action="" method="POST">
                <div class="field input">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo $cur_username ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email:</label>
                    <input type="text" name="email"  value="<?php echo $cur_email ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age:</label>
                    <input type="number" name="age" value="<?php echo $cur_age ?>" autocomplete="off" required>
                </div>
                <!-- <div class="field input">
                    <label for="curr-pass">Current Password:</label>
                    <input type="password" name="curr-pass" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="new-pass">New Password:</label>
                    <input type="password" name="new-pass" autocomplete="off" required>
                </div> -->
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
<?php } ?>
</html>