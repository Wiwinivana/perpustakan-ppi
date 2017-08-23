<?php

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM penerbit WHERE id = $id");
$query->execute();
$data = $query->fetch();

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
  <div class="panel-heading"><h1>Update Penerbit</h1></div>
</div>

<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table class="table table-border">
<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table>
	<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" input class="form-control" name="nama" value="<?= $data['nama']; ?>"></input></td>
		</tr>
		<tr>
			<td>Tahun Penerbitan</td>
			<td>:</td>
			<td><input type="text" input class="form-control" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>"></input></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>
</form>

