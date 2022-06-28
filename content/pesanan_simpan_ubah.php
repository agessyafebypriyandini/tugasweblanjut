<?php

require '../koneksi.php';
$errors = array();
$info   = array();


if(empty($_POST['txtNamapelanggan']))
	$errors['namapelanggan'] = 'Nama Pelanggan Belum Dipilih';

if(empty($_POST['txtNamaproduk']))
	$errors['namaproduk'] = 'Nama Produk Belum Dipilih';

if(empty($_POST['txtTanggal']))
	$errors['tanggal'] = 'Tanggal Pesanan Belum Diisi';

if(empty($_POST['txtJumlah']))
	$errors['jumlah'] = 'Jumlah Belum Diisi';

if(empty($_POST['txtTotal']))
	$errors['total'] = 'Total Belum Diisi';


if(! empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'pelanggan_id' => $_POST['txtNamapelanggan'],
		'produk_id' => $_POST['txtNamaproduk'],
		'tanggal_pesanan' => $_POST['txtTanggal'],
	    'jumlah' => $_POST['txtJumlah'],
		'total' => $_POST['txtTotal']
	);
	
	$where = $_POST['txtId'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE pesanan SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);
