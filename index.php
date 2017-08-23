<?php
session_start();

/*error_reporting(E_ALL);*/
ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = $db->prepare("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

	$e = mysqli_query($connection, $q);
	// hitung hasil dan cek ada atau tidaknya data
	$is_exist = mysqli_num_rows($e);
	if($is_exist>0){
	// keluarkan hasil
	$r = mysqli_fetch_assoc($e);
	$_SESSION['username'] = $user['username']; // set session untuk nama

	die('username atau password tidak ditemukan');
}
	$query->execute();
	$count = $query->fetchColumn();

	if ($count != false) {
		$query->execute();
		$user = $query->fetch();
		
		$_SESSION['id_user'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['user'] = $user['nama'];
		header('location: profile.php');
	} else {
		echo "<script>alert('Gagal')</script>";
	}
}

?>

<!DOCTYPE <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-1.12.0.min.js"></script>  
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body><div align="center" class="tengah"><p align="center"><font face="verdana" size="4" color="black">
<div class="row">
<div class="container">
<div class="col-xs-4">
	<form method="POST">
		<div class="form">
			<h2 style="text-align: center;"><b>Login Perpustakaan</b></h2>
			<div class="login-box-body">
			<h3 style="text-align: center;"><small>Silahkan masukkan username dan password</small></h3>
				<div class="form-group">
					<div class="login-logo">
					<label for="usr">Username:</label>
					<input type="text" class="form-control" placeholder="username" name="username" required=""></input>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" placeholder="password" name="password" required=""></input>
				</div>
				<button class="btn btn btn-info" name="login">Login
				</button>
			</div> <!-- login-box-body -->
		</div>
	</div>
	</form>
</div>
</div>
</div>
</body>
</html>