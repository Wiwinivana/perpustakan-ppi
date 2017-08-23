<?php
session_start();
include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penulis");
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


function getJeniskelamin($id) { 
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis_kelamin WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getJumlah($id){
	include('koneksi.php');
	$query = $db->prepare("SELECT COUNT(id) FROM buku WHERE id_penulis = $id");
	$query->execute();
	return 	$query->fetchColumn();
}


?>

<html>
<head>
	<!-- <title>Daftar Peminjaman</title> -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>  
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="../stylesheet" href="../assets/css/bootstrap.min.css">
	<script src="../assets/js/jquery-1.10.2.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</head>
	<body>

<div class="row">
	<div class="col-sm-2">
		<?php include('../profile.php'); ?>
	</div>
	<div class="col-sm-10">
		<div class="container">
		<div class="panel panel-success">
		
	 <div class="panel-heading"><h2>Daftar Penulis</h2></div>
</div>
				<?php session_start();
				if($_SESSION['role'] == 1){ ?>
			    <a href="create.php" class="btn btn-success"><i class="glyphicon glyphicon-plus "></i> Tambah Daftar Penulis</a>
			    <a href="lokasi.php" class="btn btn-success"></i>Lihat Alamat Penulis</a>
			    <?php } elseif($_SESSION['role'] == 2){ ?>
			    <a href="grafik.php" class="btn btn-success"></i> Grafik Penulis</a>
			    <?php } ?>
			    <div>&nbsp;</div>
			    <table class="table table-bordered table-stripped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama </th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
				<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
				<tr>
					<td style="text-align: center"><?= $i ?></td>
					<td><?= $value['nama'] ?></td>
					<td><?= getJeniskelamin($value['id_jenis_kelamin']);?></td>
					<td><?= $value['alamat'] ?></td>
					<td><?= getJumlah($value['id']) ?></td>
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

