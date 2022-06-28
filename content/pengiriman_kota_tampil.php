<?php
require '../koneksi.php';

$id  = $_POST['id'];
$sql = "SELECT id, jasa_id, nama_kota, ongkos FROM kota WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);