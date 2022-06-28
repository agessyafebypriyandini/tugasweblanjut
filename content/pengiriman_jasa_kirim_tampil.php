<?php
require '../koneksi.php';

$id  = $_POST['id'];
$sql = "SELECT id, nama_jasa FROM jasa_kirim WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);
