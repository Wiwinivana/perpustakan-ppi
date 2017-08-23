<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

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
  <div class="panel-heading"><h1>Rincian User</h1></div>
</div><table class="table table-border">

	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?php print $data['username']; ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><?php print $data['password']; ?></td>
	</tr>
	<tr>
		<td>Role</td>
		<td>:</td>
		<td><?php print $data['role']; ?></td>
	</tr>

</table>