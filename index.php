<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	
?>

<!DOCTYPE html>
<html>

	<head>
		<title>olshop | shopingin ajah</title>
	
		<link href="<?php echo BASE_URL."css\style.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css\bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />

	
		<script src="<?php echo BASE_URL."js\jquery-3.2.1.min"; ?>"></script>
		<script src="<?php echo BASE_URL."js\Slides-SlidesJS-3\source\jquery.slides.min.js"; ?>"></script>
	</head>
	
	<body>
	<div></div>
		<div id="container">
			<div id="header">
				<div id="menu">
					<div id="user">
						<?php
							if($user_id){
								echo "<a href='".BASE_URL. "index.php?page=my_profile&module=pesanan&action=list'><b>$nama</b></a>
													   <a href='".BASE_URL."logout.php'>Logout</a>";
							}else{
								echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
									  <a href='".BASE_URL."index.php?page=register'>Register</a>";
							}
						?>
						
					</div>	
				</div>
				<div class="row">
					<div class="col-sm-3">
						<a href="<?php echo BASE_URL. "index.php"; ?>">
							<img src="<?php echo BASE_URL. "images/logo.png"; ?>" height="70" width="150"/>
						</a>
					</div>
					<div class="col-sm-8">
						<form class="form-inline my-2 my-lg-0">
					      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					    </form>
					</div>
					<div class="col-sm-1">
						<a href="<?php echo BASE_URL. "index.php?page=Keranjang"; ?>" id="button-keranjang">
						 <img src="<?php echo BASE_URL. "images/cart.png"; ?>" height="50" width="50" margin:"right"/>
						</a>
					</div>
				</div>
					
				
				
				
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
			
			<div id="footer">
			<p>Copy Right 2018</p>
			</div>
		</div>
		
	</body>
	
</html>
