<?php

include('koneksi.php');


$query = $db->prepare("SELECT * FROM buku");
$query->execute();
$data = $query->fetch();


$nama = $_POST['nama'];
$id_jenis = $_POST['id_jenis'];

	$lokasi_file = $_FILES['cover']['tmp_name'];
	$tipe_file	 = $_FILES['cover']['type'];
	$nama_file	 = $_FILES['cover']['name'];
	$direktori	 = "cover/$nama_file"; /*manggil nama yang ada di folder buku dalam htdocs*/
$id_penulis = $_POST['id_penulis'];
print $lokasi_file;

if (!empty($lokasi_file)) {
	move_uploaded_file($lokasi_file,$direktori);
}				

print $nama.'<br>';
print $id_jenis.'<br>';
print $cover.'<br>';
print $id_penulis.'<br>';

$query = $db->prepare("INSERT INTO buku (nama, id_jenis, cover, id_penulis) VALUES ('$nama','$id_jenis','$nama_file','$id_penulis')");

if($query->execute()) 
	header("Location: index.php");


?>