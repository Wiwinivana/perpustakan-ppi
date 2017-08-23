<?php
session_start();

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getJenis($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}
function getPenulis($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
	$query->execute();
	$penulis = $query->fetch();

	return $penulis['nama'];
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
</div><table class="table table-border">
	<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
	<tr>
	<td>Jenis</td>
	<td>:</td>
	<td><?php print getJenis($data['id_jenis']);?></td>
	</tr>
	<tr>
	<td>Cover</td>
	<td>:</td>
	<td><img width="200px" src="cover/<?php print $data['cover']; ?>"/></td>
	</tr>
	<tr>
	<td>Penulis</td>
	<td>:</td>
	<td><?php print getPenulis($penulis['id_penulis']);?></td>
	</tr>
	</div>
</table>
