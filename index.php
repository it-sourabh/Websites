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
                     <a href="index.php">Home</a>
                     <a href="signup.php">Sign Up</a>
                     <a href="login.php">Login</a>
                  </div>';
        }
        else {
            echo '<div class="topnav">
                     <a href="index.php">Home</a>
                     <a href="profile.php">Profile</a>
                     <a href="php/logout.php">Log Out</a>
                  </div>';
        }
        ?>
        
    </head>
    <link rel="stylesheet" href="css/index.css">

    <body>
    <div class = "Body">
        <h1><b>Chapman University</b></h1>
        <p class="cont">
            Hello and Welcome to Chapman University
        </p>
    </div>    
    </body>
</html>