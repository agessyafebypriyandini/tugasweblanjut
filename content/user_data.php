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
	<h3 class="text-center font-weight-bold">Pengguna</h3>
	<div class="mb-3">
		<center><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#user_data">Tambah</center></button>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th width="8%">No</th>
				<th>Username</th>
				<th>Level</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
					$sql = "SELECT * FROM users";
					$data = mysqli_query($conn, $sql);
					$no = (int)1;
					foreach ($data as $rows)
					{
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rows['username'] ?></td>
				<td><?php echo $rows['level'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>

	<div class="modal fade" id="user_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Pengguna</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="" id="form_user_data">
	      		 <label for="">Username</label>
	      		 <input type="text" name="txtUsername" id="username" class="form-control" placeholder="Username">
	      		 <label for="">Level</label>
	      		 <input type="text" name="txtLevel" id="level" class="form-control" placeholder="Level">
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
				url  : 'content/user_data_simpan.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_user_data').serialize(),
				success:function(data) {
					if(!data.success){
						if(data.errors.username){
							alert(data.errors.username);
							$('#username').focus();
							return false;
						}
						if(data.errors.level){
							alert(data.errors.level);
							$('#level').focus();
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
			$('#user_data').modal('show');
			$.ajax({
				url : 'content/user_data_tampil.php',
				type : 'POST',
				dataType : 'JSON',
				data : { id : id },
				success:function(data) {
					$('#save').attr('disabled','disabled');
					$('#update').removeAttr('disabled');
					$('input[name="txtUsername"]').val(data.username);
					$('input[name="txtLevel"]').val(data.level);
					$('input[name="txtId"]').val(data.id);
				}
			})
		}

		function ubah() {
			$.ajax({
				url : 'content/user_data_simpan_ubah.php',
				type : 'POST',
				dataType : 'JSON',
				data : $('#form_user_data').serialize(),
				success:function (data) {
					if(!data.success){
						if(data.errors.username){
							alert(data.errors.username);
							$('#username').focus();
							return false;
						}
						if(data.errors.level){
							alert(data.errors.level);
							$('#level').focus();
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
					url : 'content/user_data_hapus.php',
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