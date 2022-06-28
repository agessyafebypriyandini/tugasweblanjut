<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Javanese Souveniers</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
  <h3 class="text-center font-weight-bold">Minuman</h3>
  <center><a href="?page=kategori_pembeli" class="btn btn-primary">Kembali</a></center>
  <br/>
  <div class="row">
  	<?php 
  		$sql  = "SELECT p.id, p.kat_id, p.nama_produk, p.harga, p.stok, p.detail, p.gambar, k.nama_kategori FROM produk p INNER JOIN kategori k ON k.id = p.kat_id WHERE k.id ='2'";
  		$data = mysqli_query($conn, $sql);

  	?>

  	<?php foreach ($data as $rows): ?>

  	 <div class="col-md-3 mt-4">
  	 		<div class="card h-100">
  	 		  <div class="image-box">
                <img src="images/<?php echo $rows['gambar'] ?>" class="card-img-top" alt="...">
            	</div>
                <div class="card-body">
                  <h4 class="card-title font-weight-bold"><?php echo $rows['nama_produk']; ?></h4>
                   <h6 class="card-title font-weight-bold"><?php echo $rows['nama_kategori']; ?></h6>
                   <p class="card-text text-harga">Rp.<?php echo number_format($rows['harga']); ?></p>
                   <p class="card-text text-stok">Stok : <?php echo number_format($rows['stok']); ?></p>
                   <a href="?page=pesanan" class="btn btn-danger btn-sm">Beli</a>
                  </div>
              </div>
          </div>
       <?php endforeach; ?>
      </div> 
          
  <!-- JavaScript-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>     