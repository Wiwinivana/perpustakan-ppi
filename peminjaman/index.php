<?php
session_start();
include('koneksi.php');


/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM peminjaman");
/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1') ");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'naon' WHERE id = 90");*/

/*EKSEKUSI*/
$query->execute();

/*IF MANY SELECT*/
/*$query->fetchAll();

/*IF JUST 1 SELECT */
/*$query->fetch();*/

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
	<!-- <title>Daftar Peminjaman</title> -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>  
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
	<body>

<div class="row">
	<div class="col-sm-2">
		<?php include('../profile.php'); ?>
	</div>
	<div class="col-sm-10">
		<div class="container">
		<div class="panel panel-success">
		
	 <div class="panel-heading"><h2>Daftar Peminjaman</h2></div>
</div>
				<!--  -->
			    <div>&nbsp;</div>
				<table class="table table-bordered table-stripped table-hover">
				<tr>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Buku</th>
					<th>Nama User</th>
					<th>Waktu Peminjaman</th>
					<th>Waktu Pengembalian</th>
					<th>Aksi</th>
				</tr>
				<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
				<tr>
					<td style="text-align: center"><?= $i ?></td>
					<td><?= getBuku($value['id_buku']);?></td>
					<td><?= getUser($value['id_user']);?></td>
					<td><?= $value['waktu_dipinjam'] ?></td>
					<td><?= $value['waktu_pengembalian'] ?></td>
					<td>
					<?php session_start();
						if($_SESSION['role'] == 1){ ?>
						<a href="update.php?id=<?= $value['id'] ;?>">
						<i class="glyphicon glyphicon-pencil"></i>
						</a>
						<a href="delete.php?id=<?= $value['id']; ?>">
						<i class="glyphicon glyphicon-trash"></i>
						</a>
						<a href="view.php?id=<?= $value['id']; ?>">
						<i class="glyphicon glyphicon-list-alt"></i>
						</a>
						<?php } elseif($_SESSION['role'] == 2){ ?>
						<a href="view.php?id=<?= $value['id']; ?>">
						<i class="glyphicon glyphicon-list-alt"></i>
						</a>
						<?php } ?>
					</td>
				</tr>
			<?php $i++; endforeach; ?>
		</table>
	</div>
</div>

