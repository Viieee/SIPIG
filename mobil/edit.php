<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>Mobil</h1>
        <h4>
            <small>Edit Data Mobil</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Kembali
                </a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <?php
                $id=@$_GET['id'];
                $sql_barang=mysqli_query($con,"SELECT * FROM tb_mobil WHERE id_mobil ='$id'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_barang);
            ?>
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="">Merk Mobil</label>
                    <input type="hidden" name="id"  value="<?=$data['id_mobil']?>">
                    <input type="text" name="merk" id="nama" value="<?=$data['merk_mobil']?>" class="form-control" placeholder="merk Mobil" required>
                </div>
                <div class="form-group"> 
                    <label for="">Nomor Kendaraan</label>
                    <input type="text" name="plat" id="stok" class="form-control"  value="<?=$data['nomor_kendaraan']?>" placeholder="Nomor Kendaraan" required>
                </div>
                <div class="form-group pull-right"> 
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
             </form>
            </div>
        </div>
    </div>
<?php
include_once "../_footer.php";
?>