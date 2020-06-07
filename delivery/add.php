<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>Pengiriman</h1>
        <h4>
            <small>Tambah Data Pengiriman</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Kembali
                </a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="tanggal">Tanggal Pengiriman</label>
                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Pengiriman" value="<?=date('Y-m-d')?>" required>
                </div>
                <div class="form-group"> 
                    <label for="nama_barang">Barang</label>
                    <select multiple name="barang[]" class="form-control" size="5" required>
                    <?php 
                        $sql_barang = mysqli_query($con, "SELECT * FROM tb_barang ORDER BY nama_barang ASC") or die(mysqli_error($con));
                        while($data_barang = mysqli_fetch_array($sql_barang)){
                            echo '<option value="'.$data_barang['id_barang'].'">'.$data_barang['nama_barang'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="supir">Supir</label>
                    <select name="supir" class="form-control" required>
                    <?php 
                        $sql_supir = mysqli_query($con, "SELECT * FROM tb_supir ORDER BY nama_supir ASC") or die(mysqli_error($con));
                        while($data_supir = mysqli_fetch_array($sql_supir)){
                            echo '<option value="'.$data_supir['id_supir'].'">'.$data_supir['nama_supir'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="gudang">Gudang</label>
                    <select name="gudang" class="form-control" required>
                    <?php 
                        $sql_gudang = mysqli_query($con, "SELECT * FROM tb_gudang ORDER BY nama_gudang ASC") or die(mysqli_error($con));
                        while($data_gudang = mysqli_fetch_array($sql_gudang)){
                            echo '<option value="'.$data_gudang['id_gudang'].'">'.$data_gudang['nama_gudang'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="kendaraan">Kendaraan</label>
                    <select name="kendaraan" class="form-control" required>
                    <?php 
                        $sql_kendaraan = mysqli_query($con, "SELECT * FROM tb_mobil ORDER BY merk_mobil ASC") or die(mysqli_error($con));
                        while($data_mobil = mysqli_fetch_array($sql_kendaraan)){
                            echo '<option value="'.$data_mobil['id_mobil'].'">'.$data_mobil['merk_mobil'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Masuk">Barang Masuk</option>
                        <option value="Keluar">Barang Keluar</option>
                    </select>
                </div>
                <div class="form-group pull-right"> 
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                </div>
             </form>
            </div>
        </div>
    </div>
<?php
include_once "../_footer.php";
?>