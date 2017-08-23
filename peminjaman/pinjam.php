<?php
session_start();

include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getBuku($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}
 
?>

<html>
<head>
<title>Peminjaman Buku</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header"> 	 
			</div>
</div>
<div class="panel panel-success">

  <!-- Default panel contents -->
  <div class="panel-heading"><h1>Pinjam Buku</h1></div>
</div>
 <div class="panel-body">
<form action="aksi_create.php" method="POST">
	<table>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td>
				<input class="form-control" name="nama" readonly value="<?php print getBuku($_GET['id']); ?>"></input>
				<input type="hidden" name="id_buku" value="<?= $_GET['id'] ?>"></input>
			</td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td>
				<input class="form-control" name="username" readonly value="<?php print $_SESSION['username']; ?>"></input>
				<input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>"></input>
			</td>
		</tr>
		<tr>
			<td>Waktu Dipinjam</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_dipinjam" readonly value="<?php print date("Y-m-d");?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_pengembalian" readonly value="<?php print date("Y-m-d", strtotime('+1 week'));?>"></input></td>
		</tr>


		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>


