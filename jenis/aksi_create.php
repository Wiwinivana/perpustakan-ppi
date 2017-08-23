<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];


print $nama.'<br>';


$query = $db->prepare("INSERT INTO jenis (nama) VALUES ('$nama')");

if($query->execute()) {
	header("Location: index.php");
}

?>