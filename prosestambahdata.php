<?php

require './connection.php';

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$alamat = $_POST['alamat'];
$desk = $_POST['desk'];
$akses = $_POST['akses'];
$ling = $_POST['ling'];
$hub = $_POST['hub'];
$cuaca = $_POST['cuaca'];
$biaya = $_POST['biaya'];
$query = "INSERT INTO `datawisata` (`id`, `nama`, `jeniswisata`, `alamat`, `deskripsi`, `aksesibilitas`, `kondisi_lingkungan`, `hub_dgn_wisata_lain`, `kondisi_cuaca`, `biaya`) VALUES (NULL, '$nama', '$jenis', '$alamat', '$desk', '$akses', '$ling', '$hub', '$cuaca', '$biaya');";
$result = mysqli_query($conn, $query);
?>