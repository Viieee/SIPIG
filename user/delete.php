<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
$id = $_GET['id'];
mysqli_query($con,"DELETE FROM tb_user WHERE id_user ='$id'") or die (mysqli_error($con));
$query = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user = '$id'");
$data = mysqli_fetch_array($con, $query);
//jika user yang digunakan untuk login dihapus maka akan otomatis logout
if(!isset($data['username'])){
    unset($_SESSION['user']);
    echo"<script>window.location='".base_url('auth/login.php')."';</script>";
}else{
    echo "<script>window.location='data.php';</script>";
}

?>