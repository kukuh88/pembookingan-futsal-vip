<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "web_futsal";

	$koneksi = mysqli_connect($server, $username, $password, $database) or die("Maaf koneksi ke database gagal");

?>