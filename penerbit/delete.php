<?php

include('koneksi.php');

$id = $_GET['id'];

$query = $db->prepare("DELETE FROM penerbit WHERE id=$id");

if ($query->execute()) {
	header('Location: index.php');
}
?>