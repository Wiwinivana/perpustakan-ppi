<?php

$id = $_GET['id']; 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();

$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$jenis = $query->fetchAll();

$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();

/*
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$jenis = $query->fetchAll();
function getJenis($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}*/
?>

<html>
<head>
	<title>Menu Buku</title>
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
  <div class="panel-heading"><h1>UPDATE BUKU</h1></div>
</div>
<div class="panel panel-success">

<form enctype="multipart/form-data" action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table class="table table-border">
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input class="form-control" name="nama" value="<?= $data['nama']; ?>"></input></td>
		</tr>
		<tr>
			<td>Jenis Buku</td>
			<td>:</td>
			<td>
				<select name="id_jenis" class="form-control">
					<?php $i=1; foreach ($jenis as $value): ?> 
						<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
					<?php $i++; endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Cover</td>
			<td>:</td>
			<td><input type="file" input class="form-control" name="cover" value="<?= $data['cover']; ?>"></input></td>
		</tr>
		<tr>
			<td>Penulis</td>
			<td>:</td>
			<td>
			<select name="id_penulis" class="form-control">
				<?php $i=1; foreach ($penulis as $value): ?>
					<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
				<?php $i++; endforeach; ?>
			</select>
			</td>
		</tr>
		<tr>
			<td><button class="btn btn-default" input type="submit" name="submit">Simpan</input></td>
		</tr>
		</div>
	</table>
</form>


