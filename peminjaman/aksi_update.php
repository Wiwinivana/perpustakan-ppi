<?php

include('koneksi.php');

$id = $_GET['id'];

$id_buku = $_POST['id_buku'];
$id_user = $_POST['id_user'];
$waktu_dipinjam = $_POST['waktu_dipinjam'];
$waktu_pengembalian = $_POST['waktu_pengembalian'];


print $id_buku.'<br>';
print $id_user.'<br>';
print $waktu_dipinjam.'<br>';
print $waktu_pengembalian.'<br>';

$query = $db->prepare("UPDATE peminjaman SET id_user = '$id_user', id_buku = '$id_buku', waktu_dipinjam = '$waktu_dipinjam', waktu_pengembalian = '$waktu_pengembalian' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>