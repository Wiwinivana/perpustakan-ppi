<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getJeniskelamin($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis_kelamin WHERE id = $id");
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
  <div class="panel-heading"><h1>RINCIAN PENULIS</h1></div>
</div><table class="table table-border">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php print getJeniskelamin($data['id_jenis_kelamin']);?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php print $data['alamat']; ?></td>
	</tr>
	<tr>
		<td><a href="bandung.php" class="btn btn-success"></i>Lihat  Peta</a></td>
	</tr>

</table>