<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Password</title>
        <div class="topnav">
            <a href="../index.php"><b>Home</b></a>
            <a href="profile.php"><b>Profile</b></a>
            <a href="logout.php"><b>Log Out</b></a>
        </div>
        <link rel="stylesheet" href="../css/chpwd.css">
    </head>

    <body>
    
    <div class="cont">
    <h1><b>Change Password</b></h1>
        <form action="../php/changingpwd.php" method="POST">
        <input type='password' placeholder='Current Password' name='opwd'/><br><br>
        <input type='password' placeholder='New Password' name='npwd'/><br><br>
        <input type='password' placeholder='Confirm New Password' name='cnpwd'/><br><br>
        <br><br><br>
        <input type="submit" name="submit" value="Change Password">
        </form>
        <p>
        <?php
        
          if ($_GET['error'] == 'loginfail') {echo "*Invalid Credentials";}
          if ($_GET['error'] == 'empty') {echo "*Please Input all the fields";}
        
        ?>
        </p>
        </div>

    </body>
</html>