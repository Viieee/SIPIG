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
                <a href="data.php" class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Kembali
                </a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label for="jumlah_add">Banyaknya Data yang Akan Ditambahkan</label>
                        <input type="text" name="jumlah_add" id="jumlah_add" maxlength="2" pattern="[0-9]+" class="form-control" required>
                    </div>
                    
                    <div class="form-group pull-right">
                        <input type="submit" name="generate" value="Generate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 
include_once "../_footer.php";
?>