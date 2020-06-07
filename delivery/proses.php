<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
//add dari name pada html tag input button pada add.php 
if(isset($_POST['add'])){
    //proses tambah
    $uuid = Uuid::uuid4()->toString();
    $supir = trim(mysqli_real_escape_string($con,$_POST['supir']));
    $tgl = trim(mysqli_real_escape_string($con,$_POST['tanggal']));
    $gudang= trim(mysqli_real_escape_string($con,$_POST['gudang']));
    $kendaraan = trim(mysqli_real_escape_string($con,$_POST['kendaraan']));
    $status = trim(mysqli_real_escape_string($con,$_POST['status']));
    
    mysqli_query($con, "INSERT INTO tb_delivery (id_delivery, id_gudang, id_supir, id_mobil, status ,tanggal) VALUES ('$uuid','$gudang','$supir','$kendaraan','$status','$tgl')") or die (mysqli_error($con));

    $barang = $_POST['barang'];
    foreach($barang as $brg)
    {
        mysqli_query($con,"INSERT INTO tb_barang_delivery (id_delivery, id_barang) VALUES ('$uuid','$brg')") or die (mysqli_error($con));
    }

    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit

}
?>
