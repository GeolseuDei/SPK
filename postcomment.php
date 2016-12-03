<?php
require './connection.php';

$isi = $_POST['isi'];
$tempat = $_POST['tempat'];
$query = "INSERT INTO `komen` (`id`, `isi`, `tempat`) VALUES (NULL, '$isi', '$tempat');";
$result = mysqli_query($conn, $query);
?>

