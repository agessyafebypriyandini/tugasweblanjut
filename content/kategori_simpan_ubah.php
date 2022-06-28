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
	$where = $_POST['txtId'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE kategori SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);