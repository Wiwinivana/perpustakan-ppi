<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header">
			<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>RINCIAN JENIS BUKU</h1></div>
</div><table class="table table-border">
	<tr>
		<td>Jenis Buku</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
</table>