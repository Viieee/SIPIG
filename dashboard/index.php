<?php
include_once "../_header.php";
/*<?=$_SESSION['user'];?> merupakan kependekan dari <?php echo $_SESSION['user'];?> */
?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
            <p>Selamat Datang <mark><?=$_SESSION['user'];?></mark> di SIPIG</p>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
<?php
include_once "../_footer.php";
?>