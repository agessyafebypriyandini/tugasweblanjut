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
	<h3 class="text-center font-weight-bold">Kategori</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategori">Tambah</center></button>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="8%">No</th>
				<th>Nama Kategori</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql  = "SELECT * FROM kategori";
			$data = mysqli_query($conn, $sql);
			$no   = (int)1;
			foreach ($data as $rows): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rows['nama_kategori'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_kategori">
	      		<label for="">Nama Kategori</label>
	      		 <input type="text" name="txtNama" id="nama" class="form-control" placeholder="Nama Kategori">
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
				url  : 'content/kategori_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_kategori').serialize(),
				success:function(data) {
					if(!data.success){
						alert(data.errors.nama);
						$('#nama').focus();
						return false;
					}
					else{
						alert(data.message);
						window.location.reload();
					}
				}
			})
		}

		function ganti(id) {
			$('#kategori').modal('show');
			$.ajax({
				url : 'content/kategori_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('input[name="txtNama"]').val(data.nama_kategori);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/kategori_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_kategori').serialize(),
				success:function (data) {
					if(!data.success){
						alert(data.errors.nama);
						$('#nama').focus();
						return false;
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
					url : 'content/kategori_hapus.php',
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