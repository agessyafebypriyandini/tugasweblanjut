<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtUsername']))
	$errors['username'] = 'Username Belum Diisi';

if(empty($_POST['txtLevel']))
	$errors['level'] = 'Level Belum Diisi';

if( !empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'username' => $_POST['txtUsername'],
		'level' => $_POST['txtLevel'],
	);
	
	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO users (".implode(',', $key).")"."VALUES('".implode("','", $val)."')";
	mysqli_query($conn, $sql);
	$info['success']  = true;
	$info['message'] = 'Berhasil Simpan';
}

echo json_encode($info);