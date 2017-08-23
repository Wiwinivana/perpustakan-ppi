<?php

$host = "localhost";
$dbname = "perpustakaan";
$username = "root";
$password = "";

try {

	$db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $db;
} catch (PDOException $exception) {
	die("Connection error: " . $exception->getMessage());
	
}

