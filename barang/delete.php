<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
$id = $_GET['id'];
mysqli_query($con,"DELETE FROM tb_barang WHERE id_barang ='$id'") or die (mysqli_error($con));
echo "<script>window.location='data.php';</script>";
?>