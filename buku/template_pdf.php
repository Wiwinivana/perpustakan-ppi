<?php

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
?>					
					<h1>Data Buku Perpustakaan PPI</h1>
					<table border='1' class="table table-bordered table-striped">	
							<tr>
							<thead>
								<th>No</th>
								<th>Nama Buku</th>
								<th>Jenis Buku</th>
								<th>Cover</th>
							</thead>
							</tr>
							<?php $i=1; foreach ($query->fetchAll() as $value): ?> <!-- variabel diperhatikan -->
							<tbody>
							<tr>
								<td style="text-align: center"><?= $i ?></td>
								<td><?= $value['nama'] ?></td>
								<td><?= getJenis($value['id_jenis']);?></td>
								<td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>
							
							</tr>
						<?php $i++; endforeach; ?>
						</tbody>
					</table>