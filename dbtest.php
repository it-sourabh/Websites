<?php
require_once 'php/dbh.php';
$sql = "SELECT * FROM users where uname='madhav';";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
echo $row['passwd'];
