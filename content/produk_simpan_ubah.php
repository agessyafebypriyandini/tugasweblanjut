<?php

require '../koneksi.php';
$errors = array();
$info   = array();

if(empty($_POST['txtNama']))
	$errors['nama'] = 'Nama Produk Belum Diisi';

if(empty($_POST['txtKat']))
	$errors['kategori'] = 'Nama Kategori Belum Dipilih';

if(empty($_POST['txtHarga']))
	$errors['harga'] = 'Harga Belum Diisi';

if(empty($_POST['txtStok']))
	$errors['stok'] = 'Stok Belum Diisi';

if(empty($_POST['txtDetail']))
	$errors['detail'] = 'Detail Belum Diisi';

if(empty($_POST['txtGambar']))
	$errors['gambar'] = 'Gambar Belum Diisi';


if( !empty($errors))
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'kat_id' => $_POST['txtKat'],
		'nama_produk' => $_POST['txtNama'],
		'harga' => $_POST['txtHarga'],
		'stok' => $_POST['txtStok']
	);
	
	$where = $_POST['txtId'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE produk SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);