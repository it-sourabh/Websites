<?php 

function emptysignup($fname, $lname, $uname, $mail, $pwd, $cpwd, $admno, $gender, $dob) {
    $result = null;
    if (empty($fname) || empty($lname) || empty($uname) || empty($mail) || empty($pwd) || empty($cpwd) || empty($admno) || empty($gender) || empty($dob)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invaliduname($uname) {
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidadmno($admno) {
    $result = null;
    if (!preg_match("/^[0-9]*$/", $admno)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidemail ($mail) {
    $result = null;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdmatch($pwd, $cpwd) {
    $result = null;
    if ($pwd !== $cpwd) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function unameexist($conn, $uname) {
    $sql = "SELECT * from users where uname = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmt");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
         return $row;
    }
    else {
        $res = false;
        return $res;
    }

    mysqli_stmt_close($stmt);
    
}

function mailexist($conn, $mail) {
    $sql = "SELECT * from users where email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmt2");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $mail);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
         return $row;
    }
    else {
        $res = false;
        return $res;
    }

    mysqli_stmt_close($stmt);
    
}

function unamailexist($conn, $mail, $uname) {
    $sql = "SELECT * from users where email = ? or uname = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmt5");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $mail, $uname);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
         return $row;
    }
    else {
        $res = false;
        return $res;
    }

    mysqli_stmt_close($stmt);
}

function addUser($conn, $fname, $lname, $uname, $pwd, $mail, $admno, $gender, $dob) {
    $sqli = "INSERT INTO users (fname, uname, lname, email, passwd, admno, gender, dob) values (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqli)) {
        header("Location: ../signup.php?error=stmt3");
        exit();
    }
    $hpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssiss", $fname, $uname, $lname, $mail, $hpwd, $admno, $gender, $dob);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("Location: signedup.php");
}

function emptylogin($uname, $pwd) {
    $result = null;
    if (empty($uname) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginuser($conn, $uname, $pwd) {

    $uidexist = unamailexist($conn, $uname, $uname);

    if ($uidexist == false) {
        header("Location: ../login.php?error=loginfail");
        exit();
    }

    $hpwd = $uidexist['passwd'];
    $verifypwd = password_verify($pwd, $hpwd);

    if ($verifypwd == false) {
        header("Location: ../login.php?error=loginfail");
        exit();
    }

    elseif ($verifypwd == true) {
        session_start();
        $_SESSION['uid'] = $uidexist['uid'];
        $_SESSION['uname'] = $uidexist['uname'];
        header("Location: ../index.php");
    }
}

function qrypwd($conn, $uname) {
    $sql = "SELECT * from users where uname = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../loggedin/chpwd.php?error=stmt5");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $row = mysqli_fetch_assoc($result);
    return $row;

    mysqli_stmt_close($stmt);
}

function changepwd($conn, $uname, $npwd) {
    $sqli = "UPDATE users set passwd = ? where uname = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqli)) {
        header("Location: ../loggedin/chpwd.php?error=stmt3");
        exit();
    }
    $hpwd = password_hash($npwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ss", $hpwd, $uname);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("Location: ../loggedin/chpwd.php?change=success");

}

function passstrength($password) {
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
 
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
             return true;
    } else {
            return false;
}
}