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
		'stok' => $_POST['txtStok'],
		'detail' => $_POST['txtDetail'],
		'gambar' => $_POST['txtGambar']
	);
	
	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO produk (".implode(',', $key).")"."VALUES('".implode("','", $val)."')";
	mysqli_query($conn, $sql);
	$info['success']  = true;
	$info['message'] = 'Berhasil Simpan';
}

echo json_encode($info);
