<?php
function createConn() {
	$db_user = 'sale7312';
	$db_pass = 's3cr3t';
	$db_dsn = 'mysql:host=localhost;dbname=sale7312';
	$conn = new PDO($db_dsn, $db_user, $db_pass);
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
}
?>
