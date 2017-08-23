<?php

include('koneksi.php');

$id = $_GET['id'];

$query = $db->prepare("DELETE FROM jenis_kelamin WHERE id=$id");

if ($query->execute()) {
	header('Location: index.php');
}
?>