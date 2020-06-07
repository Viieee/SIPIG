<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
//add dari name pada html tag input button pada add.php 
if(isset($_POST['add'])){
    //proses tambah
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $sim = trim(mysqli_real_escape_string($con,$_POST['sim']));
    mysqli_query($con, "INSERT INTO tb_supir (id_supir, nama_supir, nomor_SIM) VALUES ('$uuid','$nama','$sim')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $sim = trim(mysqli_real_escape_string($con,$_POST['sim']));
    mysqli_query($con, "UPDATE tb_supir SET nama_supir = '$nama', nomor_SIM = '$sim' WHERE id_supir='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>
