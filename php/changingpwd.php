<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: ../login.php");
    exit();
}

else {
    require_once '../php/dbh.php';
    require_once '../php/functions.php';
    $uname = $_SESSION['uname'];
    $opwd = $_POST['opwd'];
    $npwd = $_POST['npwd'];
    $cnpwd = $_POST['cnpwd'];

    if (empty($opwd) || empty($npwd) || empty($cnpwd)) {
        header("Location: ../loggedin/chpwd.php?error=empty");
        exit();
    }
    
    if (passstrength($npwd) !== false) {
        header("Location: ../loggedin/chpwd.php?error=weakpass");
        exit();
    }

    if ($cnpwd !== $npwd) {
        header("Location:../loggedin/chpwd.php?error=nomatch");
        exit();
    }


    $password = qrypwd($conn, $uname);
    $dbpwd = $password['passwd'];

    $vrfpwd = password_verify($opwd, $dbpwd);

    if ($vrfpwd !== true) {
        header("Location:../loggedin/chpwd.php?error=wrong");
        exit();
    }

    changepwd($conn, $uname, $npwd);


}