<?php
//setting default timezone
date_default_timezone_set('Asia/Jakarta');
session_start();
include_once "conn.php";
//koneksi
$con = mysqli_connect($connect['host'],$connect['user'],$connect['pass'],$connect['db']);
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

//fungsi base url
function base_url($url = null)
{
    //$base_url nanti diganti ketika upload ke hosting
    $base_url = "http://localhost/project/SIPIG";
    if($url != null){
        return $base_url."/".$url;
    } else{
        return $base_url;
    }
}
?>