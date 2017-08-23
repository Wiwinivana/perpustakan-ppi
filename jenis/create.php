<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header">
			<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>TAMBAH JENIS BUKU</h1></div>
</div>
 <div class="panel-body">
<form action="aksi_create.php" method="POST">
	<table class="table table-border">
		<tr>
			<td>Jenis Buku</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama"></input></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>
</form>

