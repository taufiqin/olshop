<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");


	$kode = $_GET['kode'];
	

	 $query =mysqli_query ($koneksi, "SELECT * FROM kode WHERE kode_id = $kode");

	 if ($query) {
	 	// var_dump(mysqli_fetch_assoc($query))
	 	$data=($query->fetch_assoc());
	 	echo (float) $data['diskon'];
	 }
?>