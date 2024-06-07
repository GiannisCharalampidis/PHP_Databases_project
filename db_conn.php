<?php

$sname = "localhost";
$uname = "root";
$passowrd = "";
$db_name = "db_lab_php";

$conn = mysqli_connect($sname, $uname, $passowrd, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
redirectTo('../');

?>