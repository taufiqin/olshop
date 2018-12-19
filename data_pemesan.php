<div id="psn"><b>Data Pemesan</b></div>
			<div id="hallo">
				<center><b>Lengkapi Form di Bawah Ini</b></center>
			</div>
	<hr>
<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;

		header("location:".BASE_URL."index.php?page=login");
		exit;
	}
?>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-5">
		<div id="frame-data-pengirim">
			<h3 class="label-data-pengirim">Alamat Pengiriman Barang</h3>
			
			<div id="frame-form-pengiriman">
				
				<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
				
					<div class='element-form'>
						<label>Nama Pemesan</label>
						<span><input type="text" name="nama_penerima" /></span> 
					</div>
					
					<div class='element-form'>
						<label>Nomor Telepon</label>
						<span><input type="text" name="nomor_telepon" /></span> 
					</div>
					
					<div class='element-form'>
						<label>Alamat Penerima</label>
						<span><textarea name="alamat"></textarea></span> 
					</div>
					
					<div class='element-form'>
						<label>Nama Penerima</label>
						<span>
							<select name="kota">
								<?php
									$query = mysqli_query($koneksi, "SELECT * FROM kota");
									
									while($row=mysqli_fetch_assoc($query)){
										echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
									}
								?>
							</select>
						</span>
					</div>
					
					<div class='element-form'>
						<span><input type="submit" value="submit" /></span> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-5">
		<div id="frame-data-detail">
				<div class='element-form'>
					<label>Kode Diskon</label>
					<input type="text" name="kode" id="kode" />
					<button id="cek">cek</button>
				</div>
			
			<h3 class="label-data-pengirim">Detail Order</h3>
			<div id="frame-detail-order">
				<table class="table-list">
					<tr>
						<th class='kiri'>Nama Barang</th>
						<th class='tengah'>Qty</th>
						<th class='kanan'>Total</th>
					<tr>
					
					<?php
						$subtotal = 0;
						foreach($keranjang AS $key => $value){
							$barang_id =$key;
							
							$nama_barang = $value['nama_barang'];
							$harga = $value['harga'];
							$quantity = $value['quantity'];
							
							$total = $quantity * $harga;
							$subtotal = $subtotal + $total;
							
							echo "<tr>
									<td class='kiri'>$nama_barang</td>
									<td class='tengah'>$quantity</td>
									<td class='kanan'>".rupiah($total)."</td>
								  </tr>";
						}
						echo "<tr>
							<td colspan='2' class='kanan'><b>sub Total</b></td>
							<td class='kanan'><strong><span id='total'>".$subtotal."</span></strong>
						</td>";	  
					?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>

<script type="text/javascript">


	var cek = document.getElementById('cek')
	cek.addEventListener('click', cekDiskon)

	function cekDiskon(){
		var input = document.getElementById('kode').value
		var subtotal = 0;


		console.log(input)
		
		var xhr = new XMLHttpRequest()
		xhr.open("GET","cek_diskon.php?kode="+input)
		xhr.onload = function(){
			console.log(this.responseText)
			var data = this.responseText
			var total = parseInt(document.getElementById('total').innerHTML)

			console.log(data);
			var diskon = data * total;
			subtotal = total - diskon;

			var xhr2 = new XMLHttpRequest()
			xhr2.open("GET","set_subtotal.php?subtotal="+subtotal)
			xhr2.onload = function(){
				console.log(this.responseText);
			}

			xhr2.send();
			
			document.getElementById('total').innerHTML = subtotal
		}

		xhr.send()


	}
</script>