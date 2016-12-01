<?php

//offline
$username = "root";
$password = "";
$server = "localhost";
$dbase = "jadwal";

$conn = mysqli_connect($server, $username, $password);
$database = mysqli_select_db($conn, $dbase);

?>