<?php

require './connection.php';

$uname = $_POST['uname'];
$password = $_POST['pass'];
$repassword = $_POST['repass'];
$email = $_POST['email'];
if ($password == $repassword) {
    $query = "INSERT INTO `login` (`id`, `username`, `password`, `email`) "
            . "VALUES (NULL, '$uname', MD5('$password'), '$email');";
    $result = mysqli_query($conn, $query);
}
header('Location: index.php');
?>
