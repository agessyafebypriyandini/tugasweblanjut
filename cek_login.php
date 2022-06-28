<?php 

require 'koneksi.php';

try {
	$username = $_POST['txtUser'];
	$password = $_POST['txtPass'];
	$level    = $_POST['txtLevel'];

	$cek = "SELECT * FROM users WHERE username='$username' AND password='$password' AND level='$level'";
	$hasil = mysqli_query($conn, $cek);
	$data = mysqli_num_rows($hasil);

	if ($data > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['level'] = $level;
		header('Location:index.php');
	}
	else
	{
		echo '<h3>Data Anda Tidak Valid</h3>';
		echo '<a href="login.php">Ulangi</a>';
		exit();
	}
} catch (Exception $e) {
	die('Ada Kesalahan' .$conn->connect_error);
}

?>