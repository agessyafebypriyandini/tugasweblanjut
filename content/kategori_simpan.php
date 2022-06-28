<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtNama']))
	$errors['nama'] = 'Nama Kategori Belum Diisi';

if( !empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'nama_kategori' => $_POST['txtNama']
	);

	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO kategori (".implode(',', $key).")"."VALUES('".implode(',', $val)."')";
	mysqli_query($conn, $sql);
	$info['success']  = true;
	$info['message'] = 'Berhasil Simpan';
}

echo json_encode($info);