<?php 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM penerbit");
$query->execute();

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
			 <div class="panel-heading"><h1>Tambah Penerbit</h1></div>
</div>
<form action="aksi_create.php" method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input class="form-control" input type="text" name="nama"></input></td>
		</tr>
		<tr>
			<td>Tahun Penerbitan</td>
			<td>:</td>
			<td><input class="form-control" input type="text" name="tahun_terbit"></input></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>
</form>

