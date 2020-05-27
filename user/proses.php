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
    $username = trim(mysqli_real_escape_string($con,$_POST['username']));
    $pass=sha1(trim(mysqli_real_escape_string($con,$_POST['pass'])));
    $level=trim(mysqli_real_escape_string($con,$_POST['level_user']));
    mysqli_query($con, "INSERT INTO tb_user (id_user, nama_user, username, password, level) VALUES ('$uuid','$nama','$username','$pass','$level')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $username = trim(mysqli_real_escape_string($con,$_POST['username']));
    $pass=sha1(trim(mysqli_real_escape_string($con,$_POST['pass'])));
    $level=trim(mysqli_real_escape_string($con,$_POST['level_user']));
    mysqli_query($con, "UPDATE tb_user SET nama_user = '$nama', username = '$username', password = '$pass', level = '$level' WHERE id_user='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>
