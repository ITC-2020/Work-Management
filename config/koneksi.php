<?php 
	
	//Detail Database
	$db_server = "localhost"; // Nama servernya
	$db_name = "db_workspace";	//nama databasenya
	$db_username ="root"; //username database
	$db_pass = ""; //password database

	//Melakukan Koneksi ke database
	$conn = mysqli_connect($db_server, $db_username, $db_pass, $db_name);

	//Cek apakah koneksi gagal
	if(!$conn)
	{
		die("Koneksi Gagal : ".mysqli_connect_error());
	}
?>