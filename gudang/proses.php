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
    $alamat = trim(mysqli_real_escape_string($con,$_POST['alamat']));
    mysqli_query($con, "INSERT INTO tb_gudang (id_gudang, nama_gudang, alamat_gudang) VALUES ('$uuid','$nama','$alamat')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($con,$_POST['alamat']));
    mysqli_query($con, "UPDATE tb_gudang SET nama_gudang = '$nama', alamat_gudang = '$alamat' WHERE id_gudang='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>
