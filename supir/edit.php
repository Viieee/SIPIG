<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>supir</h1>
        <h4>
            <small>Edit Data supir</small>
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
                $sql_supir=mysqli_query($con,"SELECT * FROM tb_supir WHERE id_supir ='$id'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_supir);
            ?>
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="">Nama Supir</label>
                    <input type="hidden" name="id"  value="<?=$data['id_supir']?>">
                    <input type="text" name="nama" value="<?=$data['nama_supir']?>" class="form-control" placeholder="Nama Supir" required>
                </div>
                <div class="form-group"> 
                    <label for="">sim supir</label>
                    <input type="text" name="sim" class="form-control"  value="<?=$data['nomor_SIM']?>" placeholder="Nomor SIM Supir" required>
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