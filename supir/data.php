<?php 
include_once "../_header.php";
?>

    <div class="box">
        <h1>Supir</h1>
        <h4>
            <small>Data Supir</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <?php 
                    if($_SESSION['lv']==1){
                        ?>
                        <a href="add.php" class="btn btn-success btn-xs">
                            <i class="glyphicon glyphicon-plus"></i>
                            Tambah Supir
                        </a>
                    <?php
                    }
                ?>
                
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="Supir">
                <thead>
                    <tr>
                        <th>Nama Supir</th>
                        <th>Nomor SIM Supir</th>
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

                </tbody>
            </table>
        </div>
    </div>
<script>
$(document).ready(function() {
    $('#Supir').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "supir_data.php",
        dom : 'Bfrtip',
        buttons : [{
                extend : 'pdf',
                orientation : 'potrait',
                pageSize: 'Legal',
                title : 'Data Mobil',
            },
            'csv','excel','print','copy'
        ],
        columnDefs : [{
            searchable : false,
            orderable : false,
            <?php 
                if($_SESSION['lv']==1){
                    ?>
                   targets : 2,
                <?php
                }
            ?>
            
            render : function(data,type,row){
                var btn = "<center><a href=\"edit.php?id="+data+"\" class = \"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"delete.php?id="+data+"\" class = \"btn btn-danger btn-xs\" onclick=\"return confirm('Yakin aka nmenghapus data?')\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                return btn;
            }
        }]
    } );
} );
</script>
<?php 
include_once "../_footer.php";
?>