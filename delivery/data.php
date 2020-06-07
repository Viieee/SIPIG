<?php 
include_once "../_header.php";
?>

    <div class="box">
        <h1>Pengiriman</h1>
        <h4>
            <small>Data Pengiriman</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <?php 
                    if($_SESSION['lv']==1){
                        ?>
                        <a href="add.php" class="btn btn-success btn-xs">
                            <i class="glyphicon glyphicon-plus"></i>
                            Tambah Data Pengiriman
                        </a>
                    <?php
                    }
                ?>
                
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="Delivery">
                <thead>
                    <tr>
                        <th>Tanggal Pengiriman</th>
                        <th>Nama Supir</th>
                        <th>Nama Gudang</th>
                        <th>Kendaraan</th>
                        <th>Status</th>
                        <th>Nama Barang</th>
                        <?php 
                            if($_SESSION['lv']==1){
                                ?>
                                <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                            <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        $query = "SELECT * FROM tb_delivery
                        JOIN tb_supir ON tb_delivery.id_supir = tb_supir.id_supir
                        JOIN tb_gudang ON tb_delivery.id_gudang = tb_gudang.id_gudang
                        JOIN tb_mobil ON tb_delivery.id_mobil = tb_mobil.id_mobil";
                        $sql = mysqli_query($con,$query)or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql)){?>
                        <tr>
                            <td><?=$data['tanggal']?></td>
                            <td><?=$data['nama_supir']?></td>
                            <td><?=$data['nama_gudang']?></td>
                            <td><?=$data['merk_mobil']?></td>
                            <td><?=$data['status']?></td>
                            <td>
                            <?php 
                            $sql_barang = mysqli_query($con, "SELECT * FROM tb_barang_delivery 
                            JOIN tb_barang ON tb_barang_delivery.id_barang = tb_barang.id_barang
                            WHERE id_delivery = '$data[id_delivery]'")or die(mysqli_error($con));
                            while($data_barang = mysqli_fetch_array($sql_barang)){
                                echo $data_barang['nama_barang']."<br>";
                            }
                            ?></td>
                            <td> 
                            <center>
                                <a href="delete.php?id=<?=$data['id_delivery']?>" class ="btn btn-danger btn-xs" onclick="return confirm('Yakin aka menghapus data?')">
                                 <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </center>
                            </td>
                        </tr>
                    <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('#Delivery').DataTable( {
                    dom : 'Bfrtip',
                    buttons : [{
                            extend : 'pdf',
                            orientation : 'potrait',
                            pageSize: 'Legal',
                            title : 'Data Pengiriman Barang',
                        },
                        'csv','excel','print','copy'
                    ],
                    columnDefs : [{
                        searchable : false,
                        orderable : false,
                        <?php 
                            if($_SESSION['lv']==1){
                                ?>
                            targets : 6,
                            <?php
                            }
                        ?>
                    }]
                } );
            } );
        </script>
    </div>

<?php 
include_once "../_footer.php";
?>