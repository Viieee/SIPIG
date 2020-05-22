<?php
include_once "../_config/config.php";
//bila sudah ada session, user tidak bisa mengakses page login lagi
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."';</script>";
}else{

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <div class="container">
         <div align="center" style="margin-top: 210px;">
            <?php
                //trim() berfungsi menghapus spasi diawal dan diakhir
                //mysqli_real_escape_string berfungsi untuk mencegah sql injection terhadap karakter karakter unik
                //'user' dalam kurung $_POST[] sama dengan name pada <input>
                //username dan password dalam mysqli_query berasal dari nama atribut pada tabel
                if(isset($_POST['login'])){
                    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                    $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password ='$pass'") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_login);
                    if(mysqli_num_rows($sql_login)>0){
                        //kalau tidak mau ada fitur edit profile begini saja sudah cukup
                        $_SESSION['user'] = $user;
                        $_SESSION['lv']= $data['level'];
                        echo "<script>window.location='".base_url()."';</script>";
                    } else{?>
                        <div class = "row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="alert alert-danger alert-dismissable" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <strong>Login gagal!</strong> Username/Password salah!
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
                <form action="" method="post" class="navbar-form" >
                    <div class="input-group">
                        <span class = "input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                    </div>
                    <div class="input-group">
                        <span class = "input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="login" class="btn btn-primary" value="Login">
                    </div>
                </form>
         </div>     
        </div>
    </div>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
</body>

</html>
<?php
}
?>