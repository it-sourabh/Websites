<?php

if (!isset($_POST['submit'])) {
    header("Location: ../signup.php");
}

else {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $mail = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $admno = $_POST['admno'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (emptysignup($fname, $lname, $uname, $mail, $pwd, $cpwd, $admno, $gender, $dob) !== false) {
        header("Location: ../signup.php?signup=empty&fname=$fname&lname=$lname&uname=$uname&mail=$mail&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (invaliduname($uname) !== false) {
        header("Location: ../signup.php?signup=invun&fname=$fname&lname=$lname&mail=$mail&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (invalidadmno($admno) !== false) {
        header("Location: ../signup.php?signup=invadm&fname=$fname&lname=$lname&mail=$mail&uname=$uname&gender=$gender&dob=$dob");
        exit();

    }

    if (invalidemail($mail) !== false) {
        header("Location: ../signup.php?signup=invmail&fname=$fname&lname=$lname&uname=$uname&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (pwdmatch($pwd, $cpwd) !== false) {
        header("Location: ../signup.php?signup=pwdmatch&fname=$fname&lname=$lname&uname=$uname&mail=$mail&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (unameexist($conn, $uname) !== false) {
        header("Location: ../signup.php?signup=uexist&mail=$mail&fname=$fname&lname=$lname&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (mailexist($conn, $mail) !== false) {
        header("Location: ../signup.php?signup=emexist&uname=$uname&fname=$fname&lname=$lname&admno=$admno&gender=$gender&dob=$dob");
        exit();

    }

    if (passstrength($pwd) !== false) {
        header("Location: ../signup.php?signup=weakpass&fname=$fname&lname=$lname&uname=$uname&mail=$mail&admno=$admno&gender=$gender&dob=$dob");
        exit();
    }

    addUser($conn, $fname, $lname, $uname, $pwd, $mail, $admno, $gender, $dob);
}