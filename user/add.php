<?php
include_once "../_header.php";
?>
    <div class="box">
        <h1>User</h1>
        <h4>
            <small>Tambah Data User</small>
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
                    <label for=""></label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="form-group"> 
                    <label for=""></label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group"> 
                    <label for=""></label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group" style="margin-top:20px;"> 
                    <label for="level_user">Level User : </label>
                    <select name="level_user" id="cars">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group pull-right"> 
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
                
             </form>
            </div>
        </div>
    </div>
<?php
include_once "../_footer.php";
?>