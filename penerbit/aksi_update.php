<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$tahun_terbit = $_POST['tahun_terbit'];



print $nama.'<br>';
print $tahun_terbit.'<br>';


$query = $db->prepare("UPDATE penerbit SET nama = '$nama', tahun_terbit = '$tahun_terbit' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>