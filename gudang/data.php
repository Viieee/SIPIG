<?php 
include_once "../_header.php";
?>

    <div class="box">
        <h1>Gudang</h1>
        <h4>
            <small>Data Gudang</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a href="generate.php" class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-plus"></i>
                    Tambah Data Gudang
                </a>
            </div>
        </h4>
        <form method="POST" name="proses">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Gudang</th>
                            <th>Alamat Gudang</th>
                            <th>
                                <center>
                                    <input type="checkbox" id="select_all" value="">
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        $sql_gudang = mysqli_query($con,"SELECT * FROM tb_gudang ORDER BY nama_gudang") or die (mysqli_error($con));
                        if(mysqli_num_rows($sql_gudang)>0){
                            while($data=mysqli_fetch_array($sql_gudang)){
                            //name pada input checkbox menggunakan '[]' karena akan ada lebih dari 1 data?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_gudang']?></td>
                                <td><?=$data['alamat_gudang']?></td>
                                <td>
                                    <center>
                                        <input type="checkbox" name="check[]" class="check" value="<?=$data['id_gudang']?>">
                                    </center>
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
        <div class="box pull-right">
            <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-danger btn-sm" onclick="del()"><i class="glyphicon glyphicon-trash"></i> Delete</button>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $("#select_all").on("click",function(){
            if(this.checked){
                $(".check").each(function(){
                    this.checked=true;
                });
            }else{
                $(".check").each(function(){
                    this.checked=false;
                });
            }
        });

        $(".check").on("click",function(){
            //jika jumlah dari anggota class check yang dicentang sama dengan
            //jumlah element yang masuk class check akan mencentang checkbox 
            //select all
            //prop adalah method jquery yang digunakan untuk menset value 
            //dan property dari sebuah element
            if($(".check:checked").length == $(".check").length){
                $("#select_all").prop("checked",true);
            }else{
                $("#select_all").prop("checked",false);
            }
        })
    });

    function edit(){
        //proses berasal dari name form
        document.proses.action="edit.php";
        document.proses.submit();
    }
    function del(){
        //return konfirmasi
        var conf = confirm('Yakin akan menghapus data?');
        if(conf){
            document.proses.action="delete.php";
            document.proses.submit();
        }
    }
</script>
<?php 
include_once "../_footer.php";
?>