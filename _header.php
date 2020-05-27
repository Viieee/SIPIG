<?php
include_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

// jika tidak ada session akan dialihkan ke page login
if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <span class="text-primary">
                            <b> Inventory Gudang </b>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('barang')?>">Data Barang</a>
                </li>
                <li>
                    <a href="#">Data Supir</a>
                </li>
                <li>
                    <a href="#">Data Barang Keluar/Masuk</a>
                </li>
                <li>
                    <a href="<?=base_url('gudang')?>">Data Gudang</a>
                </li>
                <?php 
                    if($_SESSION['lv']==1){
                    ?>
                        <li>
                            <a href="<?=base_url('user')?>">Data User</a>
                        </li>
                    <?php
                    }
                    ?>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>">
                        <span class="text-danger">
                          Logout
                        </span>
                    </a>
                </li>
            </ul>
        </div> 
        <div id="page-content-wrapper">
            <div class="container-fluid">
                
