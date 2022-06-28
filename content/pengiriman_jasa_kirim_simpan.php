<?php
require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtNama']))
	$errors['nama'] = 'Nama Jasa Pengiriman Belum Diisi';

if(! empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'nama_jasa' => $_POST['txtNama']
	);

	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO jasa_kirim (".implode(',', $key).")"."VALUES('".implode(',', $val)."')";
	mysqli_query($conn, $sql);
	$info['success']  = true;
	$info['message'] = 'Berhasil Simpan';
}

echo json_encode($info);