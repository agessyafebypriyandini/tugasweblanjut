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
	<h3 class="text-center font-weight-bold">Kota Pengiriman</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengiriman_kota">Tambah</center></button>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="8%">No</th>
				<th>Nama Kota</th>
				<th>Nama Jasa Pengiriman</th>
				<th>Ongkos</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$sql  = "SELECT ko.id, ko.jasa_id, ko.nama_kota, ko.ongkos, js.nama_jasa FROM kota ko INNER JOIN jasa_kirim js ON js.id = ko.jasa_id";
			$data = mysqli_query($conn, $sql);
			$no   = (int)1;
			foreach ($data as $rows): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rows['nama_kota'] ?></td>
				<td><?php echo $rows['nama_jasa'] ?></td>
				<td><?php echo $rows['ongkos'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="modal fade" id="pengiriman_kota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Kota Pengiriman</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_pengiriman_kota">
	      		 <label for="">Nama Kota Pengiriman</label>
	      		 <input type="text" name="txtKota" id="kota" class="form-control" placeholder="Nama Kota Pengiriman">
	      		 <label for="">Nama Jasa Pengiriman</label>
	      		 <select name="txtJasa" id="jasa" class="form-control custom-select">
	      		 	<option value="">Pilih Jasa Pengiriman</option>
	      		 	<?php
	      		 	$sql = "SELECT * FROM jasa_kirim"; $data = mysqli_query($conn, $sql);
	      		 	?>
	      		 	<?php foreach ($data as $opt): ?>
	      		 	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_jasa'].'</option>'; ?>
	      		 <?php endforeach ?>
	      		</select>
	      		 <label for="">Ongkos</label>
	      		 <input type="number" name="txtOngkos" id="ongkos" class="form-control" placeholder="Ongkos">
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
				url  : 'content/pengiriman_kota_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pengiriman_kota').serialize(),
				success:function(data) {
					if(!data.success){
						if(data.errors.kota){
							alert(data.errors.kota);
							$('#kota').focus();
							return false;
						}

						if(data.errors.jasa){
							alert(data.errors.jasa);
							$('#jasa').focus();
							return false;
						}

						if(data.errors.ongkos){
							alert(data.errors.ongkos);
							$('#ongkos').focus();
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
			$('#pengiriman_kota').modal('show');
			$.ajax({
				url : 'content/pengiriman_kota_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('input[name="txtKota"]').val(data.nama_kota);
					$('select[name="txtJasa"]').val(data.jasa_id);
					$('input[name="txtOngkos"]').val(data.ongkos);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/pengiriman_kota_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_pengiriman_kota').serialize(),
				success:function (data) {
					if(!data.success){
						if(data.errors.kota){
							alert(data.errors.kota);
							$('#kota').focus();
							return false;
						}

						if(data.errors.jasa){
							alert(data.errors.jasa);
							$('#jasa').focus();
							return false;
						}

						if(data.errors.ongkos){
							alert(data.errors.ongkos);
							$('#ongkos').focus();
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
					url : 'content/pengiriman_kota_hapus.php',
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
