<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$id_jenis_kelamin = $_POST['id_jenis_kelamin'];
$alamat = $_POST['alamat'];


print $nama.'<br>';
print $id_jenis_kelamin.'<br>';
print $alamat.'<br>';

$query = $db->prepare("UPDATE penulis SET nama = '$nama', id_jenis_kelamin = '$id_jenis_kelamin', alamat = '$alamat' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>