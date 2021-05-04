<?php
$dbsrvname = "localhost";
$dbuname = "root";
$dbpasswd = "";
$dbname = "project-01";

$conn = mysqli_connect($dbsrvname, $dbuname, $dbpasswd, $dbname);

if (!$conn) {
    die("Connection failed". mysqli_connect_error());
}

