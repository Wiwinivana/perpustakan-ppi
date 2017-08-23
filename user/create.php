<?php 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM user");
$query->execute();

?>

<html>
<head>
	
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<section class="col-md-5">
		<div class="table-responsive">
			<div class="page-header">
				<div class="panel panel-success">
					 <div class="panel-heading"><h1>Tambah User</h1></div>
					 	<div class="box-header">
</div>
<form action="aksi_create.php" method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input class="form-control" input type="text" name="nama">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</input>
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" class="form-control" name="username"></input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input class="form-control" input type="text" name="password"></input></td>
		</tr>
		<tr>
			<td>Role</td>
			<td>:</td>
			<td><input class="form-control" input type="text" name="role"></input></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</td>
		</tr>
	</table>
</form>

