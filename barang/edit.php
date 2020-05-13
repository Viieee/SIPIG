<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>Barang</h1>
        <h4>
            <small>Edit Data Barang</small>
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
                $sql_barang=mysqli_query($con,"SELECT * FROM tb_barang WHERE id_barang ='$id'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_barang);
            ?>
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="">Nama Barang</label>
                    <input type="hidden" name="id"  value="<?=$data['id_barang']?>">
                    <input type="text" name="nama" id="nama" value="<?=$data['nama_barang']?>" class="form-control" placeholder="Nama Barang" required>
                </div>
                <div class="form-group"> 
                    <label for="">Stok Barang</label>
                    <input type="number" name="stok" id="stok" class="form-control"  value="<?=$data['stok_barang']?>" placeholder="Stok Barang" required>
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