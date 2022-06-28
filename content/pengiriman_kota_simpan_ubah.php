<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtKota']))
	$errors['kota'] = 'Nama Kota Belum Diisi';

if(empty($_POST['txtJasa']))
	$errors['jasa'] = 'Nama Jasa Kirim Belum Dipilih';

if(empty($_POST['txtOngkos']))
	$errors['ongkos'] = 'Ongkos Belum Diisi';

if(! empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'jasa_id' => $_POST['txtJasa'],
		'nama_kota' => $_POST['txtKota'],
		'ongkos' => $_POST['txtOngkos']
	);
	
	$where = $_POST['txtId'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE kota SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);