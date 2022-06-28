<?php if ( ! isset($_SESSION['username']) AND ! isset($_SESSION['level']) ): ?>
	
	<center>
	<h3>Anda Harus Login Untuk Dapat Mengakses Menu Ini</h3>
	<a href="login.php">Login</a>
</center>
<?php elseif ($_SESSION['level'] === 'admin'): ?>

	 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <a class="navbar-brand" href="#">Javanese Souveniers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?page=home">Home<span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown01">
	              <a class="dropdown-item" href="?page=kategori">Kategori</a>
	               <a class="dropdown-item" href="?page=produk">Produk</a>
	          </div>
	          <li class="nav-item active">
              <a class="nav-link" href="?page=pelanggan">Pelanggan<span class="sr-only">(current)</span></a>
           	   </li>
	          </li>
	         	<li class="nav-item active">
              <a class="nav-link" href="?page=pesanan">Pesanan<span class="sr-only">(current)</span></a>
            </li>
	          <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengiriman</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown01">
	              <a class="dropdown-item" href="?page=pengiriman_jasa_kirim">Jasa Kirim</a>
	              <a class="dropdown-item" href="?page=pengiriman_kota">Kota Pengiriman</a>
	          	</div>
	      	  </li>
           	<li class="nav-item active">
              <a class="nav-link" href="?page=users">Pengguna<span class="sr-only">(current)</span></a>
           	</li>
           	<li class="nav-item active">
              <a class="nav-link" href="?page=about">About<span class="sr-only">(current)</span></a>
           	</li>
	            </div>
	          </li>
          </ul>
          <ul class="navbar-nav">
          	<li><a class="btn btn-outline-warning" href="logout.php">Logout</a></li>
        </div>
      </nav>

<?php else: ?>

		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <a class="navbar-brand" href="#">Javanese Souveniers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?page=home_pembeli">Home<span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown01">
	              <a class="dropdown-item" href="?page=kategori_pembeli">Kategori</a>
	               <a class="dropdown-item" href="?page=produk_pembeli">Produk</a>
	          </div>
	          <li class="nav-item active">
              <a class="nav-link" href="?page=pelanggan">Pelanggan<span class="sr-only">(current)</span></a>
           	</li>
	          <li class="nav-item active">
              <a class="nav-link" href="?page=pesanan">Pesanan<span class="sr-only">(current)</span></a>
            </li>
	          <li class="nav-item active">
              <a class="nav-link" href="?page=pengiriman_kota">Pengiriman<span class="sr-only">(current)</span></a>
           	</li>
           		<li class="nav-item active">
              <a class="nav-link" href="?page=about_pembeli">About<span class="sr-only">(current)</span></a>
           	</li>
	            </div>
	          </li>
          </ul>
          <ul class="navbar-nav">
          	<li><a class="btn btn-outline-warning" href="logout.php">Logout</a></li>
        </div>
      </nav>


<?php endif ?>