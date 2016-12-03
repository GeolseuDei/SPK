<?php
session_start();
require './connection.php';

$uname = $_POST['uname'];
$pass = md5($_POST['pass']);
$query = "SELECT * FROM `login` WHERE username='$uname' and password = '$pass'";
$result = mysqli_query($conn, $query);
$_SESSION['login']= false;
while ($row = mysqli_fetch_object($result)) {
    $_SESSION['login']=true;
}
if($_SESSION['login']==true){
    header('Location: main.php');
} else {
    unset($_SESSION['login']);
    header('Location: index.php');
}
?>

