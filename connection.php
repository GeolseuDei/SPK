<?php

//offline
$username = "root";
$password = "";
$server = "localhost";
$dbase = "spk";

$conn = mysqli_connect($server, $username, $password);
$database = mysqli_select_db($conn, $dbase);
$conn2 = mysqli_connect($server, $username, $password);
$database2 = mysqli_select_db($conn2, $dbase);

?>