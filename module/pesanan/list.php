
<?php
		$_SESSION['user_id'];
	if($level == "superadmin"){
	$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
	}else{
	$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>saat ini belum ada pemesanan</h3>";
	}else{
		?>
		<div id="psn"><b>PESANAN</b></div>
			<div id="hallo">
				<center><b>Daftar Pesanan</b></center>
				<?php 
							        echo "Hi , <a href='".BASE_URL. "index.php?page=my_profile&module=pesanan&action=list'><b>$row[nama]</b></a> ";
							        ?><br>
					Berikut adalah daftar pesanan.
			</div>
		<hr>
		<?php
		echo "
			<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri'>Nomor Pesanan</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Nama</th>
					<th class='kiri'>Action</th>
				</tr>";
		
		$adminButton = "";
		while($row=mysqli_fetch_assoc($queryPesanan)){
			if($level == "superadmin"){
				$adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
			}
			
			$status = $row['status'];
			echo"
				<tr>
					<td class='kiri'>$row[pesanan_id]</td>
					<td class='kiri'>$arrayStatusPesanan[$status]</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
						$adminButton
					</td>
				</tr>";
		}
		
		echo "</table>";
	
	}

?>