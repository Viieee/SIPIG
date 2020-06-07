<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
//add dari name pada html tag input button pada add.php 
//parameter $_POST berasal dari name pada input tag di page html
if(isset($_POST['add'])){
    //proses tambah
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $username = trim(mysqli_real_escape_string($con,$_POST['username']));
    $pass=sha1(trim(mysqli_real_escape_string($con,$_POST['pass'])));
    $level=trim(mysqli_real_escape_string($con,$_POST['level_user']));
    $sql_cek= mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username'")or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek)>0){
        echo "<script>alert('Username sudah ada, mohon ganti inputan username');window.location='add.php';</script>";
    }else{
        mysqli_query($con, "INSERT INTO tb_user (id_user, nama_user, username, password, level) VALUES ('$uuid','$nama','$username','$pass','$level')") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
}else if(isset($_POST['edit'])){
    //proses edit
    $id=$_POST['id'];
    $nama = trim(mysqli_real_escape_string($con,$_POST['nama']));
    $username = trim(mysqli_real_escape_string($con,$_POST['username']));
    $pass=sha1(trim(mysqli_real_escape_string($con,$_POST['pass'])));
    $level=trim(mysqli_real_escape_string($con,$_POST['level_user']));
    //mengedit username sendiri bisa, mengedit username menjadi sama dengan username user lain
    //tidak bisa
    $sql_cek= mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username' AND id_user != '$id'")or die (mysqli_error($con));
    //mengecek apakah ada username yang sama dengan inputan dari page edit.php dan bukan mengedit diri sendiri
    if(mysqli_num_rows($sql_cek)>0){
        //jika ada username yang sama dengan inputan tetapi memiliki id yang berbeda maka akan kembali ke page edit.php
        echo "<script>alert('Username sudah ada, mohon ganti inputan username');window.location='edit.php?id=$id';</script>";
    }else{
        //jika tidak maka akan dijalankan query update
        mysqli_query($con, "UPDATE tb_user SET nama_user = '$nama', username = '$username', password = '$pass', level = '$level' WHERE id_user='$id'") or die (mysqli_error($con));
        //jika user mengedit dirinya sendiri maka akan di unset sessionnya (dipaksa logout).
        if($_SESSION['user'] == $username){
            unset($_SESSION['user']);
            echo "<script>window.location='".base_url('auth/login.php')."';</script>";
        }else{
            echo "<script>window.location='data.php';</script>";
        }
    }
}
?>
