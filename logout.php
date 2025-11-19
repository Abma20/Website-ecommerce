<?php
session_start();
session_unset(); // Menghapus semua session variables
session_destroy(); // Menghancurkan session
header('Location: toko.php'); // Redirect ke halaman login
exit();
?>
