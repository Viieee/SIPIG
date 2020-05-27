<?php 
include_once "../_header.php";
?>

    <div class="box">
        <h1>User</h1>
        <h4>
            <small>Data User</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a href="add.php" class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-plus"></i>
                    Tambah User
                </a>
            </div>
        </h4>
        <form method="POST" name="proses">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        $sql_user = mysqli_query($con,"SELECT * FROM tb_user ORDER BY nama_user") or die (mysqli_error($con));
                        $jml= mysqli_num_rows($sql_user);
                        if($jml>0){
                            while($data=mysqli_fetch_array($sql_user)){
                            //name pada input checkbox menggunakan '[]' karena akan ada lebih dari 1 data?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_user']?></td>
                                <td><?=$data['username']?></td>
                                <td><?=$data['password']?></td>
                                <td><?=$data['level']?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_user']?>" class="btn btn-warning btn-xs">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?=$data['id_user']?>" onclick="return confirm('Yakin aka nmenghapus data?')" class="btn btn-danger btn-xs">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                            }
                        }else{
                            echo"<tr><td colspan=\"4\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </form>
        <div class="box pull-left">
                Jumlah Data : <b><?=$jml?></b>
        </div> <br>
        <div class="box pull-left" style="margin-top: 20px;">
            Level 1 = Level Admin <br>
            Level 2 = Level User
        </div>
    </div>

<?php 
include_once "../_footer.php";
?>