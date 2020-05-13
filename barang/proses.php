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
    $stok = trim(mysqli_real_escape_string($con,$_POST['stok']));
    mysqli_query($con, "INSERT INTO tb_barang (id_barang, nama_barang, stok_barang) VALUES ('$uuid','$nama','$stok')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $stok = trim(mysqli_real_escape_string($con,$_POST['stok']));
    mysqli_query($con, "UPDATE tb_barang SET nama_barang = '$nama', stok_barang = '$stok' WHERE id_barang='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>
