<?php

session_start();
session_destroy();
echo "<script>alert('Anda Telah Keluar Dari Menu'); window.location = 'login.php'</script>";

?>