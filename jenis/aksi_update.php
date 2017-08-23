<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];

print $nama.'<br>';



$query = $db->prepare("UPDATE jenis SET nama = '$nama' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>