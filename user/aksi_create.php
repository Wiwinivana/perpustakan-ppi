<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role	= $_POST['role'];


print $nama.'<br>';
print $username.'<br>';
print $password.'<br>';
print $role.'<br>';


$query = $db->prepare("INSERT INTO user (nama, username, password, role) VALUES ('$nama','$username','$password','$role')");

if($query->execute()) {
	header("Location: index.php");
}

?>