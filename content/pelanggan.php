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
	<h3 class="text-center font-weight-bold">Pelanggan</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#pelanggan">Tambah</center></button>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th>Nama </th>
				<th>No. Telp</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Nama Kota</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT pl.id, pl.kota_id, pl.nama, pl.telp, pl.email, pl.alamat, ko.nama_kota FROM pelanggan pl INNER JOIN kota ko ON ko.id = pl.kota_id";
		$data = mysqli_query($conn, $sql);
		$no   = (int)1;
		foreach ($data as $rows): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rows['nama'] ?></td>
				<td><?php echo $rows['telp'] ?></td>
				<td><?php echo $rows['email'] ?></td>
				<td><?php echo $rows['alamat'] ?></td>
				<td><?php echo $rows['nama_kota'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="modal fade" id="pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Pelanggan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_pelanggan">
	      		 <label for="">Nama</label>
	      		 		<input type="text" name="txtNama" id="nama" class="form-control" placeholder="Nama">
	      		<label for="">No. Telp</label>
	      			<input type="number" name="txtTelp" id="telp" class="form-control" placeholder="No. Telp">
	      		<label for="">Email</label>
	      		<input type="text" name="txtEmail" id="email" class="form-control" placeholder="Email">
	      		<label for="">Alamat</label>
	      		<input type="text" name="txtAlamat" id="alamat" class="form-control" placeholder="Alamat">
	      		<label for="">Nama Kota</label>
	      		<select name="txtKota" id="kota" class="form-control custom-select">
	      		 	<option value="">Pilih Kota</option>
	      		 	<?php
	      		 	$sql = "SELECT * FROM kota"; $data = mysqli_query($conn, $sql);
	      		 	?>
	      		 	<?php foreach ($data as $opt): ?>
	      		 	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_kota'].'</option>'; ?>
	      		 <?php endforeach ?>
	      		</select>
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
				url  : 'content/pelanggan_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pelanggan').serialize(),
				success:function(data) {
					if(!data.success){
						if(data.errors.nama){
							alert(data.errors.nama);
							$('#nama').focus();
							return false;
						}

						if(data.errors.telp){
							alert(data.errors.telp);
							$('#telp').focus();
							return false;
						}

						if(data.errors.email){
							alert(data.errors.email);
							$('#email').focus();
							return false;
						}

						if(data.errors.alamat){
							alert(data.errors.alamat);
							$('#alamat').focus();
							return false;
						}
						if(data.errors.kota){
							alert(data.errors.kota);
							$('#kota').focus();
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
			$('#pelanggan').modal('show');
			$.ajax({
				url : 'content/pelanggan_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('input[name="txtNama"]').val(data.nama);
					$('input[name="txtTelp"]').val(data.telp);
					$('input[name="txtEmail"]').val(data.email);
					$('input[name="txtAlamat"]').val(data.alamat);
					$('select[name="txtKota"]').val(data.kota_id);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/pelanggan_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pelanggan').serialize(),
				success:function (data) {
					if(!data.success){
						if(data.errors.nama){
							alert(data.errors.nama);
							$('#nama').focus();
							return false;
						}

						if(data.errors.telp){
							alert(data.errors.telp);
							$('#telp').focus();
							return false;
						}

						if(data.errors.email){
							alert(data.errors.email);
							$('#email').focus();
							return false;
						}

						if(data.errors.alamat){
							alert(data.errors.alamat);
							$('#alamat').focus();
							return false;
						}
						if(data.errors.kota){
							alert(data.errors.kota);
							$('#kota').focus();
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
					url : 'content/pelanggan_hapus.php',
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