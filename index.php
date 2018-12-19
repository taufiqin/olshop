<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	//$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	//$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	//new modify 7
	if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION["user_id"];
    $queryProfile = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$user_id");
    $row = mysqli_fetch_assoc($queryProfile);
	$_SESSION['dataUser']=$row;
	}
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);
	
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Olshop | Olshopin Aja !</title>
		
		<link rel="shortcut icon" type="images/x-icon" href="images/favi.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
		<script src="<?php echo BASE_URL."js/jquery-3.2.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

		<script>
			$(function() {
			$('#slides').slidesjs({
				width: 940,
				height: 528,
				navigation: false
			});
			});
		</script>
	</head>
	
	<body>
	
		<div id="container">
			<div id="header">
				<div id="menu">
					<div class="row">
						<div class="col-md-10"></div>
						<div class="col-md-2">
							<div id="user">
							<?php 
						       if(isset($user_id)){ 
							        echo "Hi , <a href='".BASE_URL. "index.php?page=my_profile&module=pesanan&action=list'><b>$row[nama]</b></a> 
							                <a href='".BASE_URL."logout.php'>Logout</a>"; 
						       }else{ 
							        ?>
										<a href="#login-modal" data-toggle="modal" data-target="#login-modal">Login</a>
										<a href="#registrasi-modal" data-toggle="modal" data-target="#registrasi-modal">Registrasi</a>
										<?php 
						       } 
						    ?>
							
						</div>	
						</div>
					</div>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
  				<a class="navbar-brand" href="<?php echo BASE_URL. "index.php"; ?>">
					<img src="<?php echo BASE_URL. "images/lg.png"; ?>" height="70" width="180"/>
							</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			   <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item ">
			        <a class="nav-link" href="#"></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#"></a>
			      </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    </form>
			   <div id="cart">
							<a href="<?php echo BASE_URL. "index.php?page=Keranjang"; ?>" id="button-keranjang">
							 <img src="<?php echo BASE_URL. "images/cart1.png"; ?>" height="40" width="40"/>
							 <?php 
						       if($totalBarang != 0){ 
						        echo "<span class='total-barang'>$totalBarang</span>"; 
						       } 
						      ?>
							</a>
						</div>
			  </div>
</nav>
			</div>
			

			<div id="content">
				<?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
			</div>
			
			

			<!-- <div id="fitur">
				<div class="row">
					<div class="col-lg">
						<div class="ftr">
							<img src="images/ongkir1.png">
						</div>
					</div>
					<div class="col-lg">
						<div class="ftr">
						 <img src="images/diskon1.png">
						</div>
					</div>
					<div class="col-lg">
						<div class="ftr">
						  <img src="images/pulsa1.png">
						</div>
					</div>
				</div>
			</div> -->
		
			
			<!-- LOGIN -->
			<div class="modal" tabindex="-1" role="dialog" id="login-modal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Login</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
					<div id="container-user-akses">
						<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">
							<?php
								$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
								
								if($notif == "true"){
									echo "<div class='notif'>maaf, email atau password yang anda masukan tidak cocok</div>"; 
								}
							?>
						  <div class="element-form">
								<label>Email</label>
								<span><input type="text" name="email"/></span>
							</div>
							
							<div class="element-form">
								<label>Password</label>
								<span><input type="password" name="password" /></span>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" value="login">Login</button>
							</div>	
						</form>
		      		</div>
		      </div>
		    	</div>
		  	  </div>
			</div>

			<!-- REGISTRASI -->
			<div class="modal" tabindex="-1" role="dialog" id="registrasi-modal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Registrasi</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
					<div id="container-user-akses">
						<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">
						<?php
							$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
							$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
							$email = isset($_GET['email']) ? $_GET['email'] : false;
							$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
							$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
							
							if($notif == "require"){
								echo "<div class='notif'>maaf, kamu harus melengkapi form dibawah ini</div>"; 
							}else if ($notif == "password") {
								echo "<div class='notif'>maaf, password yang anda masukan tidak sama</div>";
							}else if ($notif == "email") {
								echo "<div class='notif'>maaf, email yang anda masukan sudah terdaftar</div>";
							}
						?>
						  <div class="element-form">
							<label>Nama Lengkap</label>
							<span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" /></span>
						</div>
						
						<div class="element-form">
							<label>Email</label>
							<span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
						</div>
						
						<div class="element-form">
							<label>Nomor Telepon / Handphone</label>
							<span><input type="text" name="phone" value="<?php echo $phone; ?>"/></span>
						</div>
						
						<div class="element-form">
							<label>Alamat</label>
							<span><textarea name="alamat"><?php echo $alamat; ?></textarea></span>
						</div>
						
						<div class="element-form">
							<label>Password</label>
							<span><input type="password" name="password" /></span>
						</div>
						
						<div class="element-form">
							<label>Re-Type Password</label>
							<span><input type="password" name="re_password" /></span>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" value="register">Daftar</button>
						</div>	
						
						</form>
		      		</div>
		      </div>
		    	</div>
		  	  </div>
		</div>
	</body>
</html>
