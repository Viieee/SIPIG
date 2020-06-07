<?php 
$sql_barang = mysqli_query($con, "SELECT * FROM tb_barang") or die(mysqli_error($con));
while($data_barang = mysqli_fetch_array($sql_barang)){
    echo '<option value="'.$data_barang['id_barang'].'">'.$data_barang['nama_barang'].'</option>';
}
?>
