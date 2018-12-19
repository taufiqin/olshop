<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	// admin_only("barang", $level);
	
	$nama_barang = $_POST['nama_barang'];
	$kategori_id = $_POST['kategori_id'];
	$spesifikasi = $_POST['spesifikasi'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$link = $_POST['link'];
	$update_gambar ="";
	if(!empty($_FILES["file"]["name"])){
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"] ["tmp_name"], "../../images/barang/".$nama_file);
	
		$update_gambar = ", gambar='$nama_file'";
	}
	

	if($button == "Add"){

		$status = mysqli_query($koneksi , "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, link, status) 
											VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok','$link','$status')");
		var_dump(mysqli_error($koneksi));
		exit;
	}
	else if($button == "update"){
		$barang_id = $_GET['barang_id'];
		
		mysqli_query ($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
													nama_barang='$nama_barang',
													spesifikasi='$spesifikasi',
													harga='$harga',
													stok='$stok',
													link='$link',
													status='$status' 
													$update_gambar WHERE barang_id='$barang_id'");
	}
	
	header("location: ".BASE_URL."index.php?page=my_profile&module=barang&action=list");