<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
//add dari name pada html tag input button pada add.php 
if(isset($_POST['add'])){
    //proses tambah
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con,$_POST['merk']));
    $plat = trim(mysqli_real_escape_string($con,$_POST['plat']));
    mysqli_query($con, "INSERT INTO tb_mobil (id_mobil, merk_mobil, nomor_kendaraan) VALUES ('$uuid','$nama','$plat')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['merk']));
    $plat = trim(mysqli_real_escape_string($con,$_POST['plat']));
    mysqli_query($con, "UPDATE tb_mobil SET merk_mobil = '$nama', nomor_kendaraan = '$plat' WHERE id_mobil='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>
