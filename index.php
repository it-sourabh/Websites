<?php

 session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>University</title>
        <?php
        if (!isset($_SESSION['uname'])) {
            echo '<div class="topnav">
                     <a href="index.php"><b>Home</b></a>
                     <a href="signup.php"><b>Sign Up</b></a>
                     <a href="login.php"><b>Login</b></a>
                  </div>';
        }
        else {
            echo '<div class="topnav">
                     <a href="index.php"><b>Home</b></a>
                     <a href="loggedin/profile.php"><b>Profile</b></a>
                     <a href="loggedin/logout.php"><b>Log Out</b></a>
                  </div>';
        }
        ?>
        
    </head>
    <link rel="stylesheet" href="css/index.css">

    <body>
    <div class = "Body">
    <h1><b>Chapman University</b></h1>
        <p class="cont">
        <?php
            if (isset($_SESSION['uname'])) {
                echo "Hello ". $_SESSION['uname']. ", Welcome to Chapman University";
            }
            else {
                echo "Hello and Welcome to Chapman University";    
            }
        ?>
        </p>
    </div>    
    </body>
</html>