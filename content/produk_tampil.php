<?php
require '../koneksi.php';

$id  = $_POST['id'];
$sql = "SELECT id, kat_id, nama_produk, harga, stok, detail, gambar FROM produk WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);