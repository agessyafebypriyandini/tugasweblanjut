<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtUsername']))
	$errors['username'] = 'Username Belum Diisi';

if(empty($_POST['txtLevel']))
	$errors['level'] = 'Level Belum Diisi';

if(! empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'username' => $_POST['txtUsername'],
		'level' => $_POST['txtLevel']
	);
	
	$where = $_POST['txtId'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE users SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);