<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>User</h1>
        <h4>
            <small>Edit Data User</small>
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
                //$id diumpankan melalui href di page data
                $id=@$_GET['id'];
                $sql_user=mysqli_query($con,"SELECT * FROM tb_user WHERE id_user ='$id'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_user);
            ?>
             <form action="proses.php" method="post">
                <div class="form-group"> 
                    <label for="">Nama User</label>
                    <input type="hidden" name="id"  value="<?=$data['id_user']?>">
                    <input type="text" name="nama" id="nama" value="<?=$data['nama_user']?>" class="form-control" placeholder="Nama Barang" required>
                </div>
                <div class="form-group"> 
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-control"  value="<?=$data['username']?>" placeholder="Stok Barang" required>
                </div>
                <div class="form-group"> 
                    <label for="">Password</label>
                    <input type="text" name="pass" id="pass" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group"> 
                    <label for="">Level</label>
                    <label class="radio-inline" style="margin-left:10px;">
                        <input type="radio" name="level_user" value="1" required <?php if($data['level']=='1') echo 'checked'?>> 1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="level_user" value="2" <?php if($data['level']=='2') echo 'checked'?>>  2
                    </label>
                </div>
                <div class="form-group pull-right"> 
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
                <div class="form-group pull-left">
                    Level 1 = Level Admin <br>
                    Level 2 = Level User
                </div>
             </form>
            </div>
        </div>
    </div>
<?php
include_once "../_footer.php";
?>