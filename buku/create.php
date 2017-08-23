<?php 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$data = $query->fetchAll();

/*$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$jenis = $query->fetchAll();*/

$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();
/*function getPenulis($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
	$query->execute();
	$penulis = $query->fetch();

	return $penulis['nama'];
}*/

?>

<html>
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
			 <div class="panel-heading"><h1>TAMBAH BUKU</h1></div>
			 <div class="panel-body">
			</div>
</div>
<div class="panel panel-success">
<form enctype="multipart/form-data" action="aksi_create.php" method="POST">
	<table class="table table-border">
	<thead>
	<tbody>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama"></input></td>
		</tr>
		<tr>
			<td>Jenis Buku</td>
			<td>:</td>
			<td>
				<select name="id_jenis" class="form-control">
					<?php $i=1; foreach ($data as $value): ?> 
						<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
					<?php $i++; endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Cover</td>
			<td>:</td>
			<td><input class="form-control" type="file" name="cover"></input></td>
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
		<td><button class="btn btn-default" input type="submit" name="submit">Submit</input></td>
		</tr>
		</div>
		</tbody>
		</thead>
	</table>
	</div>
</form>


