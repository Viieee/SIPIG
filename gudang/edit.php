<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>Gudang</h1>
        <h4>
            <small>Edit Data Gudang</small>
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
                $sql_gudang=mysqli_query($con,"SELECT * FROM tb_gudang WHERE id_gudang ='$id'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_gudang);
            ?>
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="">Nama Gudang</label>
                    <input type="hidden" name="id"  value="<?=$data['id_gudang']?>">
                    <input type="text" name="nama" value="<?=$data['nama_gudang']?>" class="form-control" placeholder="Nama Gudang" required>
                </div>
                <div class="form-group"> 
                    <label for="">Alamat Gudang</label>
                    <input type="text" name="alamat" id="stok" class="form-control"  value="<?=$data['alamat_gudang']?>" placeholder="Alamat Gudang" required>
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