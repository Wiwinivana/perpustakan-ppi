<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$id_jenis_kelamin = $_POST['id_jenis_kelamin'];
$alamat = $_POST['alamat'];


print $nama.'<br>';
print $id_jenis_kelamin.'<br>';
print $alamat.'<br>';


$query = $db->prepare("INSERT INTO penulis (nama, id_jenis_kelamin, alamat) VALUES ('$nama','$id_jenis_kelamin','$alamat')");

if($query->execute()) {
	header("Location: index.php");
}

?>