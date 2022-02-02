<?php
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = "db";
$dsn = "mysql:host=$host;dbname=$dbname";

try {
	$connection = new PDO("mysql:host=$host", $username, $password);
	$sql = file_get_contents(__DIR__ . "/data/db.sql");
	$connection->exec($sql);
} catch (PDOException $error) {
	echo 'провал: ' . $error;
}