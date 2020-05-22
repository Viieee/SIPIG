<?php 
include_once "../_header.php";
//for pada label sama dengan id pada input
//name pada input berurusan data
//id dan class pada html berurusan dengan css dan js
?>
    <div class="box">
        <h1>Gudang</h1>
        <h4>
            <small>Tambah Data Gudang</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-info btn-xs">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Data
                </a>
                <a href="generate.php" class="btn btn-primary btn-xs">
                    Tambah Data Lagi
                </a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="POST">
                   <input type="hidden" name="total_tambah" value="<?=$_POST['jumlah_add']?>">
                   <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nama Gudang</th>
                        <th>Alamat Gudang</th>
                    </tr>
                    <?php
                        for ($i=1; $i <= $_POST['jumlah_add']  ; $i++) {?>
                        <tr>
                            <td><?=$i?></td>
                            <td>
                                <input type="text" name="nama-<?=$i?>" lass="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="alamat-<?=$i?>" lass="form-control" required>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                   </table>
                   <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
                   </div>
                </form>
            </div>
        </div>
    </div>
<?php 
include_once "../_footer.php";
?>