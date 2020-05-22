<?php
//proses tambah dan edit jadi satu dalam file ini
include_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
//add dari name pada html tag input button pada add.php 
if(isset($_POST['add'])){
    //proses tambah
    //total_tambah dari name input hidden di add.php
    $total=$_POST['total_tambah'];
    for ($i=1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($con,$_POST['nama-'.$i]));
        $alamat = trim(mysqli_real_escape_string($con,$_POST['alamat-'.$i]));
        $sql=mysqli_query($con, "INSERT INTO tb_gudang (id_gudang, nama_gudang, alamat_gudang) VALUES ('$uuid','$nama','$alamat')") or die (mysqli_error($con));
    }
    if($sql){
        echo "
        <script>
        alert('".$total." data berhasil ditambahkan');
        window.location='data.php';
        </script>";
    } else{
        echo "
        <script>
        alert('".$total." data berhasil ditambahkan');
        window.location='generate.php';
        </script>";
    }
    
}else if(isset($_POST['edit'])){
    
}
?>