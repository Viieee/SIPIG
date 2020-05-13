<?php
include_once "../_config/config.php";

//session destroy akan menghapus semua session yang tercetak
//unset akan menghapus variabel tertentu (session user saja yg dihapus)
unset($_SESSION['user']);
echo "<script>window.location='".base_url('auth/login.php')."';</script>";
?>