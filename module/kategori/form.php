<?php

	$kategori_id = isset ($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$kategori = "";
	$status = "";
	$button = "Add";
	
	if($kategori_id) {
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
		$row = mysqli_fetch_assoc($queryKategori);
		
		$kategori = $row['kategori_id'];
		$status = $row['status'];
		$button = "update";
	}

?>

<form action="<?php echo BASE_URL. "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">


	<div class="element-form">
			<label>kategori barang</label>
			<span><input type="text" name="kategori" value="<?php echo $kategori; ?>" /></span>
	</div>
	
	<div class="element-form">
			<label>status</label>
			<span>
				<input type="radio" name="status" value="on" <?php if($status == "on") {echo "checked='true'";} ?> /> On
				<input type="radio" name="status" value="off" <?php if($status == "off") {echo "checked='true'";} ?> /> Off
			</span>
	</div>	
	
	<div class="element-form">
			<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>

</form>
