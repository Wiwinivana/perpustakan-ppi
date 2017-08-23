<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getBuku($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getUser($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM user WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

?>
<html>
<head>
	
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header">
			<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>RINCIAN BUKU</h1></div>
</div>
<table class="table table-border">
	<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print getBuku($data['id_buku']);?></td>
	</tr>
	<tr>
		<td>Nama User</td>
		<td>:</td>
		<td><?php print getUser($data['id_user']);?></td>
	</tr>
	<tr>
		<td>Waktu Peminjaman</td>
		<td>:</td>
		<td><?php print $data['waktu_dipinjam']; ?></td>
	</tr>
	<tr>
		<td>Waktu Pengembalian</td>
		<td>:</td>
		<td><?php print $data['waktu_pengembalian']; ?></td>
	</tr>

</table>