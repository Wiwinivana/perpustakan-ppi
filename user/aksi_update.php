<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];


print $nama.'<br>';
print $username.'<br>';
print $password.'<br>';
print $role.'<br>';

$query = $db->prepare("UPDATE user SET nama = '$nama', username = '$username', password = '$password', role =
'$role' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>