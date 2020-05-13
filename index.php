<?php
include_once "_config/config.php";
//bila sudah ada session, user tidak bisa mengakses page login lagi
if(isset($_SESSION['user'])){
    //<a href="auth/logout.php">Logout</a>
    echo "<script>window.location='".base_url('dashboard')."';</script>";
}else{
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
