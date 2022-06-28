<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtNama']))
	$errors['nama'] = 'Nama Belum Diisi';

if(empty($_POST['txtTelp']))
	$errors['telp'] = 'No. Telp Belum Diisi';

if(empty($_POST['txtEmail']))
	$errors['email'] = 'Email Belum Diisi';

if(empty($_POST['txtAlamat']))
	$errors['alamat'] = 'Alamat Belum Diisi';

if(empty($_POST['txtKota']))
	$errors['kota'] = 'Nama Kota Belum Dipilih';

if(! empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'kota_id' => $_POST['txtKota'],
		'nama' => $_POST['txtNama'],
		'telp' => $_POST['txtTelp'],
		'email' => $_POST['txtEmail'],
		'alamat' => $_POST['txtAlamat']
	);
	
	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO pelanggan (".implode(',', $key).")"."VALUES('".implode("','", $val)."')";
	mysqli_query($conn, $sql);
	$info['success']  = true;
	$info['message'] = 'Berhasil Simpan';
}

echo json_encode($info);