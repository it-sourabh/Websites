<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <div class="topnav">
          <a href="index.php">Home</a>
          <a href="signup.php">Sign Up</a>
          <a href="login.php">Login</a>
        </div>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
    
    <div class="cont">
    <h1><b>Student Login</b></h1>
        <form action="php/loggingin.php" method="POST">
        <?php
            if ($_GET['uname']) {
                $uname = $_GET['uname'];
                echo "<input type='text' placeholder='Username or E-mail' required name='unamail' value='$uname' /><br><br>";
            }
            else {
                echo "<input type='text' placeholder='Username or E-mail' required name='unamail'/><br><br>";
            }

            if ($_GET['pwd']) {
                $pwd = $_GET['pwd'];
                echo "<input type='password' placeholder='Password' required name='passwd' value='$pwd'/><br><br>";
            }
            else {
                echo "<input type='password' placeholder='Password' required name='passwd'/><br><br>";
            }
        ?>
        <br><br><br>
        <input type="submit" name="submit" value="Log In">
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