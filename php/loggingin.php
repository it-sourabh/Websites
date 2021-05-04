<?php

if (!isset($_POST['submit'])) {
    header("Location: ../signup.php");
}

else {

    $uname = $_POST['unamail'];
    $pwd = $_POST['passwd'];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (emptylogin($uname, $pwd) !== false) {
        header("Location: ../login.php?error=empty&uname=$uname&pwd=$pwd");
        exit();

    }

    loginuser($conn, $uname, $pwd);
}