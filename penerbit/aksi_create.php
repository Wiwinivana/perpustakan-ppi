<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$tahun_terbit = $_POST['tahun_terbit'];


print $nama.'<br>';
print $tahun_terbit.'<br>';


$query = $db->prepare("INSERT INTO penerbit (nama, tahun_terbit) VALUES ('$nama','$tahun_terbit')");

if($query->execute()) {
	header("Location: index.php");
}

?>