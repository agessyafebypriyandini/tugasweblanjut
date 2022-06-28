<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags --> 
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Javanese Souveniers</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<style type="text/css">
		body{
			padding-top:  75px;
		}
	</style>
</head>
<body>
	<?php require 'nav.php'; ?>
	<div class="container">
		<?php
			if (isset($_GET['page']))
			{
				$page = isset($_GET['page']) ? $_GET['page'] : "";
				if ($page == 'home') 
				{
					require 'content/home.php';
				}
				elseif($page == 'home_pembeli')
				{
					require 'content/home_pembeli.php';
				}
				elseif($page == 'kategori')
				{
					require 'content/kategori.php';
				}
				elseif($page == 'kategori_makanan')
				{
					require 'content/kategori_makanan.php';
				}
				elseif($page == 'kategori_minuman')
				{
					require 'content/kategori_minuman.php';
				}
				elseif($page == 'kategori_kerajinantangan')
				{
					require 'content/kategori_kerajinantangan.php';
				}
				elseif($page == 'kategori_souvenier')
				{
					require 'content/kategori_souvenier.php';
				}
				elseif($page == 'kategori_pembeli')
				{
					require 'content/kategori_pembeli.php';
				}
				elseif($page == 'kategori_pembeli_makanan')
				{
					require 'content/kategori_pembeli_makanan.php';
				}
				elseif($page == 'kategori_pembeli_minuman')
				{
					require 'content/kategori_pembeli_minuman.php';
				}
				elseif($page == 'kategori_pembeli_kerajinantangan')
				{
					require 'content/kategori_pembeli_kerajinantangan.php';
				}
				elseif($page == 'kategori_pembeli_souvenier')
				{
					require 'content/kategori_pembeli_souvenier.php';
				}
				elseif($page == 'produk')
				{
					require 'content/produk.php';
				}
				elseif($page == 'produk_pembeli')
				{
					require 'content/produk_pembeli.php';
				}
				elseif($page == 'produk_pembeli_detail')
				{
					require 'content/produk_pembeli_detail.php';
				}
				elseif($page == 'pesanan')
				{
					require 'content/pesanan.php';
				}
				elseif($page == 'pengiriman_kota')
				{
					require 'content/pengiriman_kota.php';
				}
				elseif($page == 'pengiriman_jasa_kirim')
				{
					require 'content/pengiriman_jasa_kirim.php';
				}
				elseif($page == 'pelanggan')
				{
					require 'content/pelanggan.php';
				}
				elseif($page == 'users')
				{
					require 'content/user_data.php';
				}
				elseif($page == 'about')
				{
					require 'content/about.php';
				}
				elseif($page == 'about_pembeli')
				{
					require 'content/about_pembeli.php';
				}
				else 
				{
					echo '<h2>File Tidak Tersedia Di Folder Content</h2>';
				}
			}
		?>
	</div>

	<!-- JavaScript-->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
