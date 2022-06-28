<?php
require '../koneksi.php';

$id  = $_POST['id'];
$sql = "SELECT id, kota_id, nama, telp, email, alamat FROM pelanggan WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);
