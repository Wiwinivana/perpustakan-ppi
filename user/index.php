<?php

include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM user");
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
		
	 <div class="panel-heading"><h3>Daftar User</h3></div>
</div>
			    <a href="create.php" class="btn btn-success"><i class="glyphicon glyphicon-plus "></i> Tambah User</a>
			    <div>&nbsp;</div>
			    <table class="table table-bordered table-stripped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Role</th>
					<th>Aksi</th>
				</tr>
				<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
				<tr>
					<td style="text-align: center"><?= $i ?></td>
					<td><?= $value['nama'] ?></td>
					<td><?= $value['username'] ?></td>
					<td><?= $value['password'] ?></td>
					<td><?= $value['role'] ?></td>
					<td>
						<a href="update.php?id=<?= $value['id'] ;?>">
						<i class="glyphicon glyphicon-pencil"></i>
						</a>
						<a href="delete.php?id=<?= $value['id']; ?>">
						<i class="glyphicon glyphicon-trash"></i>
						</a>
						<a href="view.php?id=<?= $value['id']; ?>">
						<i class="glyphicon glyphicon-list-alt"></i>
						</a>
					</td>
				</tr>
			<?php $i++; endforeach; ?>
		</table>
	</div>
</div>

