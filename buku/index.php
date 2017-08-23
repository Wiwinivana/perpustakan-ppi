<?php
session_start();
include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM buku");

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

<div class="row">
	<div class="col-sm-2">
		<?php include('../profile.php'); ?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="container">
			<div class="" ="panel panel-success">
		
	 			<div class="panel-heading"><h3>Daftar Buku</h3></div>
			</div>
				<?php session_start();
				if($_SESSION['role'] == 1){ ?>
			    <a href="create.php" class="btn btn-success"><i class="glyphicon glyphicon-plus "></i> Tambah Buku</a>
			    <a href="export.php" class="btn btn-success">Export Excel</a>
			    <a href="eksportword.php" class="btn btn-success">Export Word</a>
			    <a href="export_mpdf.php" class="btn btn-success">Export PDF</a>
			    <?php } ?>
					</div>
			    <div>&nbsp;</div>
					<table class="table table-bordered table-striped">
							<tr>
							<thead>
								<th>No</th>
								<th>Nama Buku</th>
								<th>Jenis Buku</th>
								<th>Cover</th>
								<th>Penulis</th>
								<th>Aksi</th>
							</thead>
							</tr>
							<?php $i=1; foreach ($query->fetchAll() as $value): ?> <!-- variabel diperhatikan -->
							<tbody>
							<tr>
								<td style="text-align: center"><?= $i ?></td>
								<td><?= $value['nama'] ?></td>
								<td><?= getJenis($value['id_jenis']);?></td>
								<td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>
								<td><?= getPenulis($value['id_penulis']);?></td>
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
									<a href="../peminjaman/pinjam.php?id=<?= $value['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-plus "></i>Pinjam</a>			
									<?php } ?>
								</td>
							</tr>
						<?php $i++; endforeach; ?>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>
</div>
</body>

