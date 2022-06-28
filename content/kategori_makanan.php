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
  <h3 class="text-center font-weight-bold">Makanan</h3>
  <br/>
  <table class="table table-striped">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th width="20%">Nama Produk </th>
        <th width="15%">Nama Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th width="20%">Detail</th>
        <th>Gambar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql  = "SELECT p.id, p.kat_id, p.nama_produk, p.harga, p.stok, p.detail, p.gambar, k.nama_kategori FROM produk p INNER JOIN kategori k ON k.id = p.kat_id WHERE k.id ='1'";
      $data = mysqli_query($conn, $sql);
      $no   = (int)1;
      foreach ($data as $rows): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $rows['nama_produk'] ?></td>
        <td><?php echo $rows['nama_kategori'] ?></td>
        <td><?php echo $rows['harga'] ?></td>
        <td><?php echo $rows['stok'] ?></td>
        <td><?php echo $rows['detail'] ?></td>
        <td><img src="images/<?php echo $rows['gambar'] ?>" width="80%"></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

 

  </script>

  <!-- JavaScript-->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>
</html>