<div class="row">
  <div class="col-sm-2">
    <div id="kiri">
      <?php 
    echo kategori($kategori_id); 
   ?>
    </div>
  </div>  

  <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-4">
      <div id="detail-barang"> 
      <?php 
            $barang_id = $_GET['barang_id']; 
            $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'"); 
            $row = mysqli_fetch_assoc($query); 
             
            echo "<h2>$row[nama_barang]</h2> 
               <img src='".BASE_URL."images/barang/$row[gambar]' />";
           ?> 
           <div id="video">
            <h2>Video Review</h2><br>
             <iframe src="https://www.youtube.com/embed/HxXkDh0FPUU?controls=0">
            </iframe>
           </div>
    </div>
  </div>
    <div class="col-sm-5">
      <div id="materi">
          <?php 
         echo "<h2>Detail</h2> $row[spesifikasi] 
         <span><b>".rupiah($row['harga'])."</b></span> "; 
         ?>
        </div>
    </div>
    <div class="col-sm-3">
      <div class="dropdown">Pilihan Warna : <br>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          White
        </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">LightBlue</a>
            <a class="dropdown-item" href="#">Pink</a>
            <a class="dropdown-item" href="#">Silver</a>
          </div>
      </div><br><br>
      <div class="dropdown">Pilihan Size : <br>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Size
        </button>
      </div>
      <?php
        echo "<div class='button-add-cart'> 
                 <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>Add to cart</a> 
                </div>";
      ?>
    </div>
  </div>
 