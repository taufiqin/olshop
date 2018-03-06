<?php

	$server = "localhost";
	$username = "root";
	$password = "1";
	$database = "olshop";
	
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");
	 
