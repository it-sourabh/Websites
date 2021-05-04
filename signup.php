<!DOCTYPE html>
<html>
    <head>
        <title>Create ID</title>
        
        <link rel="stylesheet" href="css/signup.css">
        <div class="topnav">
          <a href="index.php">Home</a>
          <a href="signup.php">Sign Up</a>
          <a href="login.php">Login</a>
        </div>
    </head>

  
    <body class="body">
    <div class="cont">
    <h1><b>Student Form</b></h1>
        <form method="POST" action="php/signingup.php">
        <?php
        if (isset($_GET['fname'])) {
        $fname = $_GET['fname'];
        echo "<input type='text' placeholder='First Name' name='fname' value='$fname'/><br><br>";
        }
        else {
            echo "<input type='text' placeholder='First Name' name='fname' /><br><br>";
        }

        if (isset($_GET['lname'])) {
            $lname = $_GET['lname'];
            echo "<input type='text' placeholder='Last Name' name='lname' value='$lname'/><br><br>";
            }
            else {
                echo '<input type="text" placeholder="Last Name" name="lname"/><br><br>';
            }

        if (isset($_GET['mail'])) {
            $mail = $_GET['mail'];
            echo "<input type='text' placeholder='E-Mail' name='email' value='$mail'/><br><br>";
            }
            else {
                echo '<input type="text" placeholder="E-Mail" name="email"/><br><br>';
            }

        if (isset($_GET['uname'])) {
            $uname = $_GET['uname'];
            echo "<input type='text' placeholder='Username' name='uname' value='$uname'/><br><br>";
            }
            else {
                echo '<input type="text" placeholder="Username" name="uname" /><br><br>';
            }

        if (isset($_GET['admno'])) {
            $admno = $_GET['admno'];
            echo "<input type='text' placeholder='Admission No.' name='admno' value='$admno'/><br><br>";
            }
            else {
                echo '<input type="text" placeholder="Admission No." name="admno"/><br><br>';
            }

        if (isset($_GET['dob'])) {
            $dob = $_GET['dob'];
            echo "DOB: <input type='date' name='dob' value='$dob'><br><br>";
            }
            else {
                echo 'DOB: <input type="date" name="dob"><br><br>';
            }

        ?>
        <input type="password" placeholder="Enter Password" name="pwd"/><br><br>
        <input type="password" placeholder="Confirm Password" name="cpwd"/><br><br>
        Gender: <input type="radio" name="gender" value="male" id="male">Male
        <input type="radio" name="gender" value="female" id="female">Female
        <input type="radio" name="gender" value="other" id="other">Other<br><br>
        <br><br>
        <input type="submit" name="submit" value="Sign Up">
        <p>
        <?php

          if ($_GET['signup'] == "invmail") {echo "*Please Enter a valid e-mail";}
          if ($_GET['signup'] == "empty") {echo "*Please Enter all the fields";}
          if ($_GET['signup'] == "invun") {echo "*Please Enter a valid username";}
          if ($_GET['signup'] == "pwdmatch") {echo "*Passwords do not match";}
          if ($_GET['signup'] == "uexist") {echo "*Username Already Exists";}
          if ($_GET['signup'] == "emexist") {echo "*E-Mail Already Exists";}
          if ($_GET['signup'] == "invadm") {echo "*Please Enter a valid Admission Number";}
          if (isset($_GET['gender'])) {
            $gender = $_GET['gender'];
            echo "<script>document.getElementById('$gender').checked = true;</script>";
          }

        ?>
        </p>
        </form>
        </div>
    </body>
</html>