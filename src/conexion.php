<?php
	$serverDB = "localhost";
	$userDB = "root";
	$passDB = "";
	$DB = "Proyecto_Tienda";

	$conn = mysqli_connect($serverDB, $userDB, $passDB, $DB);
	return $conn;
?>