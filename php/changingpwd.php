<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: ../login.php");
}

else {
    require_once '../php/dbh.php';
    $uname = $_SESSION['uname'];
    $opwd = $_POST['opwd'];
    $npwd = $_POST['npwd'];
    $cnpwd = $_POST['cnpwd'];

    if (empty($opwd) || empty($npwd) || empty($cnpwd)) {
        header("Location: ../loggedin/chpwd.php?error=empty");
        exit();
    }

    if ($cnpwd !== $npwd) {
        header("Location:../loggedin/chpwd.php?error=nomatch");
        exit();
    }
}