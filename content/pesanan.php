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
	<h3 class="text-center font-weight-bold">Pesanan</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#pesanan">Tambah</button>
		<a href="?page=pengiriman_kota" class="btn btn-success">Pengiriman</a></center>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th>Nama Pelanggan</th>
				<th>Nama Produk</th>
				<th>Tanggal Pesanan</th>
				<th>Jumlah</th>
				<th>Total</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT ps.id, ps.produk_id, ps.pelanggan_id, ps.tanggal_pesanan, ps.jumlah, ps.total, p.nama_produk, pl.nama FROM pesanan ps INNER JOIN pelanggan pl ON pl.id = ps.pelanggan_id INNER JOIN produk p ON p.id = ps.produk_id";
		$data = mysqli_query($conn, $sql);
		$no   = (int)1;
		foreach ($data as $rows): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rows['nama'] ?></td>
				<td><?php echo $rows['nama_produk'] ?></td>
				<td><?php echo $rows['tanggal_pesanan'] ?></td>
				<td><?php echo $rows['jumlah'] ?></td>
				<td><?php echo $rows['total'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="modal fade" id="pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_pesanan">
	      		<label for="">Nama</label>
	      		<select name="txtNamapelanggan" id="namapelanggan" class="form-control custom-select">
	      		 	<option value="">Pilih Nama Pelanggan</option>
	      		 	<?php
	      		 	$sql = "SELECT * FROM pelanggan"; $data = mysqli_query($conn, $sql);
	      		 	?>
	      		 	<?php foreach ($data as $opt): ?>
	      		 	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama'].'</option>'; ?>
	      		 <?php endforeach ?>
	      		</select>
	      		<label for="">Nama Produk</label>
	      		<select name="txtNamaproduk" id="namaproduk" class="form-control custom-select">
	      		 	<option value="">Pilih Nama Produk</option>
	      		 	<?php
	      		 	$sql = "SELECT * FROM produk"; $data = mysqli_query($conn, $sql);
	      		 	?>
	      		 	<?php foreach ($data as $opt): ?>
	      		 	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_produk'].'</option>'; ?>
	      		 <?php endforeach ?>
	      		</select>
	      		<label for="">Tanggal Pesanan</label>
	      			<input type="date" name="txtTanggal" id="tanggal" class="form-control" placeholder="Tanggal Pesanan">
	      		<label for="">Jumlah</label>
	      			<input type="number" name="txtJumlah" id="jumlah" class="form-control" placeholder="Jumlah">
	      		<label for="">Total</label>
	      			<input type="number" name="txtTotal" id="total" class="form-control" placeholder="Total">
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
				url  : 'content/pesanan_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pesanan').serialize(),
				success:function(data) {
					if(!data.success){
						if(data.errors.namapelanggan){
							alert(data.errors.namapelanggan);
							$('#namapelanggan').focus();
							return false;
						}

						if(data.errors.namaproduk){
							alert(data.errors.namaproduk);
							$('#namaproduk').focus();
							return false;
						}

						if(data.errors.tanggal){
							alert(data.errors.tanggal);
							$('#tanggal').focus();
							return false;
						}

						if(data.errors.jumlah){
							alert(data.errors.jumlah);
							$('#jumlah').focus();
							return false;
						}

						if(data.errors.total){
							alert(data.errors.total);
							$('#total').focus();
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
			$('#pesanan').modal('show');
			$.ajax({
				url : 'content/pesanan_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('select[name="txtNamapelanggan"]').val(data.pelanggan_id);
					$('select[name="txtNamaproduk"]').val(data.produk_id);
					$('input[name="txtTanggal"]').val(data.tanggal_pesanan);
					$('input[name="txtJumlah"]').val(data.jumlah);
					$('input[name="txtTotal"]').val(data.total);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/pesanan_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pesanan').serialize(),
				success:function (data) {
					if(!data.success){
						if(data.errors.namapelanggan){
							alert(data.errors.namapelanggan);
							$('#namapelanggan').focus();
							return false;
						}
						
						if(data.errors.namaproduk){
							alert(data.errors.namaproduk);
							$('#namaproduk').focus();
							return false;
						}

						if(data.errors.tanggal){
							alert(data.errors.tanggal);
							$('#tanggal').focus();
							return false;
						}

						if(data.errors.jumlah){
							alert(data.errors.jumlah);
							$('#jumlah').focus();
							return false;
						}

						if(data.errors.total){
							alert(data.errors.total);
							$('#total').focus();
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
					url : 'content/pesanan_hapus.php',
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