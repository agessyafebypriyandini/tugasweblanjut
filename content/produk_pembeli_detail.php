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
  <h3 class="text-center font-weight-bold">Detail Produk</h3>
  <br/>
    <div class="row">
    <?php 
      $sql  = "SELECT p.id, p.kat_id, p.nama_produk, p.harga, p.stok, p.detail, p.gambar, k.nama_kategori FROM produk p INNER JOIN kategori k ON k.id = p.kat_id";
      $data = mysqli_query($conn, $sql);

    ?>

    <?php foreach ($data as $rows): ?>
    <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark"><?php echo $rows['nama_produk']; ?></a>
              </h3>
              <br/>
              <h6 class="mb-0">
                <a class="text-dark" href="?page=kategori_pembeli"><?php echo $rows['nama_kategori']; ?></a>
              </h6>
              <br/>
              <p class="card-text text-harga">Rp.<?php echo number_format($rows['harga']); ?></p>
              <p class="card-text text-stok">Stok : <?php echo number_format($rows['stok']); ?></p>
              <p class="card-text mb-auto"><?php echo $rows['detail']; ?></p>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="images/<?php echo $rows['gambar'] ?>" alt="Card image cap" width="50%">
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
