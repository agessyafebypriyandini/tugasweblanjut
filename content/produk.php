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
	<h3 class="text-center font-weight-bold">Produk</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produk">Tambah</center></button>
	</div>
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
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql  = "SELECT p.id, p.kat_id, p.nama_produk, p.harga, p.stok, p.detail, p.gambar, k.nama_kategori FROM produk p INNER JOIN kategori k ON k.id = p.kat_id";
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
				<td>
				 <a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
				 <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_produk">
	      		<label for="">Nama Produk</label>
	      		 <input type="text" name="txtNama" id="nama" class="form-control" placeholder="Nama Produk">
	      		 <label for="">Nama Kategori</label>
	      		 <select name="txtKat" id="kategori" class="form-control custom-select">
	      		 	<option value="">Pilih Kategori</option>
	      		 	<?php
	      		 	$sql = "SELECT * FROM kategori"; $data = mysqli_query($conn, $sql);
	      		 	?>
	      		 	<?php foreach ($data as $opt): ?>
	      		 	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_kategori'].'</option>'; ?>
	      		 <?php endforeach ?>
	      		</select>
	      		 <label for="">Harga</label>
	      		 <input type="number" name="txtHarga" id="harga" class="form-control" placeholder="Harga">
	      		 <label for="">Stok</label>
	      		 <input type="number" name="txtStok" id="stok" class="form-control" placeholder="Stok">
	      		 <label for="">Detail</label>
	      		 <input type="text" name="txtDetail" id="detail" class="form-control" placeholder="Detail">
	      		 <label for="">Gambar</label>
	      		 <input type="text" name="txtGambar" id="gambar" class="form-control" placeholder="Gambar">
	       		<input type="hidden" name="txtId">
	      	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="save" class="btn btn-primary" onclick="simpan()">Simpan</button>
	        <button type="button" id="update" class="btn btn-warning" disabled="disabled" onclick="ubah()">Ubah</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		function simpan() {
			$.ajax({
				url  : 'content/produk_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_produk').serialize(),
				success:function(data) {
					if(!data.success){
						if(data.errors.nama){
							alert(data.errors.nama);
							$('#nama').focus();
							return false;
						}

						if(data.errors.kategori){
							alert(data.errors.kategori);
							$('#kategori').focus();
							return false;
						}

						if(data.errors.harga){
							alert(data.errors.harga);
							$('#harga').focus();
							return false;
						}

						if(data.errors.stok){
							alert(data.errors.stok);
							$('#stok').focus();
							return false;
						}

						if(data.errors.detail){
							alert(data.errors.detail);
							$('#detail').focus();
							return false;
						}

						if(data.errors.gambar){
							alert(data.errors.gambar);
							$('#gambar').focus();
							return false;
						}
					}
					else{
						alert(data.message);
						window.location.reload();
					}
				}
			})
		}

		function ganti(id) {
			$('#produk').modal('show');
			$.ajax({
				url : 'content/produk_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('input[name="txtNama"]').val(data.nama_produk);
					$('select[name="txtKat"]').val(data.kat_id);
					$('input[name="txtHarga"]').val(data.harga);
					$('input[name="txtStok"]').val(data.stok);
					$('input[name="txtDetail"]').val(data.detail);
					$('input[name="txtGambar"]').val(data.gambar);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/produk_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_produk').serialize(),
				success:function (data) {
					if(!data.success){
						if(data.errors.nama){
							alert(data.errors.nama);
							$('#nama').focus();
							return false;
						}

						if(data.errors.kategori){
							alert(data.errors.kategori);
							$('#kategori').focus();
							return false;
						}

						if(data.errors.harga){
							alert(data.errors.harga);
							$('#harga').focus();
							return false;
						}

						if(data.errors.stok){
							alert(data.errors.stok);
							$('#stok').focus();
							return false;
						}

						if(data.errors.detail){
							alert(data.errors.detail);
							$('#detail').focus();
							return false;
						}

						if(data.errors.gambar){
							alert(data.errors.gambar);
							$('#gambar').focus();
							return false;
						}

					}
					else{
						alert(data.message);
						window.location.reload();
					}
				}
				
			})
		}

		function hapus(id) {
			if (confirm('Anda Yakin Ingin Menghapus ?')) {
				$.ajax({
					url : 'content/produk_hapus.php',
					type : 'POST',
					dataType : 'JSON',
					data : {id : id},
					success:function(data) {
						if(!data.success){
							alert(data.errors.id);
							$('#id').focus();
							return false;
						}
						else{
							alert(data.message);
							window.location.reload();
						}
					}
				})
			}
		}

	</script>

	<!-- JavaScript-->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>
</html>