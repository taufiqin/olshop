<div class="row">
	<div class="col-sm-2">
		<div id="kiri">
			<?php
				echo kategori($kategori_id);
			?>
		</div>
	</div>

	<div class="col-sm">
		<div id="kanan">
	<div class="slides">
		<!-- <?php
		
			$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
			while($rowBanner=mysqli_fetch_assoc($queryBanner)){
				echo "<img src='".BASE_URL."images/slide/$rowBanner[gambar]' />";
			}
		?> -->
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="images/sale7.jpg" alt="First slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/sale8.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/sale4.jpg" alt="Third slide">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	 </div>
			<div id="barang">
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
						
						echo "<div class='card detail-barang'>
				         
				        <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'> 
				         <img src='".BASE_URL."images/barang/$row[gambar]' /> 
				        </a> 
				        <p class='price'>".rupiah($row['harga'])."</p>
				        <div class='keterangan-gambar'> 
				         <p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p> 
				         <span>stok : $row[stok]</span> 
				        </div> 
				        <div class='button-add-cart'> 
				         <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>Add to cart</a> 
				        </div>
				        </div>"; 
						
						$no++;
					}
				?>
			
			</div>

		</div>
	
	</div>
</div>
<hr><b><center>PAYMENT</b>
				<div class="payment">
						<img src="images/Daftar_12.PNG">
			    		<img src="images/Daftar_13.PNG">
			    		<img src="images/Daftar_14.PNG">
			    		<img src="images/Daftar_15.PNG">
			    	</div></center>
<hr>
<hr><b><center>JASA PENGIRIMAN</b>
				<div class="payment">
						<img src="images/jne.PNG">
			    		<img src="images/tiki.PNG">
			    		<img src="images/pos.jpg">
			    		<img src="images/jt.jpg">
			    		<img src="images/sicepat.PNG">
			    	</div></center>
<hr>
<div id="footer">
			<footer>
				<div class="row">
			  	<div class="col-sm-2">
			      	 <a href="<?php echo BASE_URL. "index.php"; ?>">
						<img src="<?php echo BASE_URL. "images/logoo.png"; ?>" height="70" width="180"/>
					</a> 
			    </div>
			    <div class="col-sm-2">
			    	<b>Your Account</b><br>
					YOUR ACCOUNT<br>
					PERSONAL INFORMATION<br>
					ADDRESSES<br>
					DISCOUNT<br>
					ORDER HISTORY<br>
			    </div>
			    <div class="col-sm-2">
			    	<b>Iinformation</b><br>
					CONTACT<br>
					SITEMAP<br>
					LEGAL NOTICE<br>
					TERMS AND CONDITIONS<br>
					ABOUT US
				</div>
				 <div class="col-sm-4">
			    	<b>Butuh Bantuan? Call Me</b><br>
					08:00 - 21:00 WIB  (Hari Kerja)<br>
					09:00 - 18:00 WIB  (Weekend)<br>
					+6221-7824-001<br>
					+6221-8068-2226<br>
					customer@olshop.com<br>
					Jl. Telekomunikasi No. 01, Terusan Buah Batu, Sukapura, Dayeuhkolot, Sukapura, Dayeuhkolot, Bandung, Jawa Barat 40257
			    </div>
			  </div>
			</footer>
		</div>
