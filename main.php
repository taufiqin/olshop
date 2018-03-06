<div class="slides">
		 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="images/Daftar_3.png" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/Daftar_4.png" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/sale1.jpeg" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
	</div>
</div>

		<?php
		
			//$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
			//while($rowBanner=mysqli_fetch_assoc($queryBanner)){
				//echo "<img src='".BASE_URL."images/slide/$rowBanner[gambar]' />";
			//}
		
		?>
	 
	 </div>
	 <div class="temp">
	 	<div class="row">
	<div class="col-sm-2">
		<div id="kiri">
			<div id="menu-kategori">
			
				<ul>
				
					<?php
				
						$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
					
						while($row=mysqli_fetch_assoc($query)){
					
							echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori_barang]</a></li>";
						}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div id="kanan">
			<div id="barang">
				<ul>
				<?php
					if($kategori_id){
						$query = mysqli_query($koneksi, "SELECT *FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 15");
					}else{
						$query = mysqli_query($koneksi, "SELECT *FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 15");
					}
					$no=1;
					while($row=mysqli_fetch_assoc($query)){
						
						$style=false;
						if($no == 3){
							$style="style='margin-right:0px'";
							$no=0;
						}
						
						echo "<li $style>
								<p class='price'>".rupiah($row['harga'])."</p>
								<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
									<img src='".BASE_URL."images/barang/$row[gambar]' />
								</a>
								<div class='keterangan-gambar'>
									<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
									<span>stok : $row[stok]</span>
								</div>
								<div class='button-add-cart'>
									<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
								</div>";
						
						$no++;
					}
				?>
				</ul>
			
			</div>

		</div>
	</div>

	<div id="fitur">
				<div class="row">
					<div class="col-sm">
						<div class="ftr">
							<img src="images/free.png">
						</div>
					</div>
					<div class="col-sm">
						<div class="ftr">
						 <img src="images/diskon.png">
						</div>
					</div>
					<div class="col-sm">
						<div class="ftr">
						  <img src="images/pulsa.png">
						</div>
					</div>
				</div>
			</div>
			
			<div id="footer">
			  <div class="row">
			  	<div class="col-sm">
			      <img class="lgo" src="images/logo.png" height="100" width="100">
			    </div>
			    <div class="col-sm">
			      <u><b>Layanan</b></u>
			    <a class="nav-link" href="#">Bantuan</a> 
				<a class="nav-link" href="#">Produk Index</a>
				<a class="nav-link" href="#">Review Produk</a>
				<a class="nav-link" href="#">Konfirmasi Transer</a>
				<a class="nav-link" href="#">Status Order</a>
				<a class="nav-link" href="#">Free Ongkir</a>
			    </div>
			    <div class="col-sm">
			      <u><b>Tentang Olshop</b></u>
			     <a class="nav-link" href="#">About Us</a>
			     <a class="nav-link" href="#">Syarat & Ketentuan</a>
			     <a class="nav-link" href="#">Kebijakan Privasi</a>
			    </div>
			    <div class="col-sm">
			      <u><b>Pembayaran </b><br></u>
			      <img class="Pembayaran" src="images/Daftar_12.png">
			      <img class="Pembayaran" src="images/Daftar_13.png">
			      <img class="Pembayaran" src="images/Daftar_14.png">
			      <img class="Pembayaran" src="images/Daftar_15.png">
			      <img class="Pembayaran" src="images/Login_16.png">
			      
			    </div>
			  </div>
			</div>
			
</div>
	 </div>




