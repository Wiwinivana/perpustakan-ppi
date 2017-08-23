<?php

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();


$query = $db->prepare("SELECT * FROM buku");
$query->execute();
$buku = $query->fetchAll();

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
  <div class="panel-heading"><h1>Update Peminjaman</h1></div>
</div>

<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table>
	<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><select name="id_buku" class="form-control">
					<?php $i=1; foreach ($buku as $value): ?> 
						<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
					<?php $i++; endforeach; ?>
				</select></td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><input type="text" input class="form-control" name="id_user" readonly value="<?=($data['id_user']); ?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input class="form-control" type="date" name="waktu_dipinjam" readonly value="<?= $data['waktu_dipinjam']; ?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control"  type="date" name="waktu_pengembalian" readonly value="<?= $data['waktu_pengembalian']; ?>"></input></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>
</form>

