<?php 
include_once "../_header.php";
?>

    <div class="box">
        <h1>Barang</h1>
        <h4>
            <small>Data Barang</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a href="add.php" class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-plus"></i>
                    Tambah Barang
                </a>
            </div>
        </h4>
        <div style="margin-bottom: 20px;">
              <form action="" class="form-inline" method="POST">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Cari Barang">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </div>
              </form>  
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Stok Barang</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$no adalah nomor pada tabel
                    //$posisi memastikan di tiap page list barang akan diawali dengan nomor 1
                    //karena variabel $posisi akan digunakan di 
                    //$hal adalah nomor halaman page yang sedang ditampilkan
                    //$hal diperlukan karena akan dilakukan pagination
                    //yang akan memisahkan total seluruh barang ke beberapa page
                    //di project ini, item yang akan ditampilkan per page ada 5 item
                    //bisa dilihat di $batas
                    $batas = 5; 
                    $hal = @$_GET['hal']; 
                    //line if/else dibawah berfungsi untuk mendefinisikan state default dari
                    //variabel $hal, yaitu 1.
                    if(empty($hal)){
                        $posisi = 0;
                        $hal = 1;
                    }else{
                        $posisi=($hal - 1) * $batas;
                    }
                    $no=1;
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        //pencarian pada $_POST sama dengan name input pada html diatas
                        $pencarian = trim(mysqli_real_escape_string($con,$_POST['pencarian']));
                        if($pencarian != ''){
                            //$queryjml adalah query yang akan digunakan untuk menampilkan 
                            //banyaknya item yang dihasilkan oleh query
                            $sql = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$pencarian%' ORDER BY nama_barang";
                            $query = $sql;
                            $queryJml = $sql;
                            $no = $posisi+1;
                        }
                        else{
                            //jika $pencarian kosong maka akan menampilkan semua data
                            //limit digunakan untuk membatasi jumlah item yang ditampilkan di page
                            //hal ini dilakukan oleh kelompok kami dengan kesepakatan bersama
                            //agar tampilan terlihat lebih rapi.
                            //pada project ini limit hanya digunakan pada saat page pada state normal
                            //atau pada saat user tidak melakukan proses search barang
                            //$posisi berperan sebagai offset (batas awal)  dari data yang akan ditampilkan
                            //contoh : offsetnya 1, berarti data yang akan ditampilkan adalah data dari nomor 2
                            $query = "SELECT * FROM tb_barang  ORDER BY nama_barang LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_barang";
                            $no=$posisi+1;
                        }
                    }else{
                        //jika tombol pencarian tidak diklik
                        $query = "SELECT * FROM tb_barang ORDER BY nama_barang LIMIT $posisi, $batas ";
                        $queryJml = "SELECT * FROM tb_barang";
                        $no=$posisi+1;
                    }
                    $sql_barang = mysqli_query($con, $query) or die (mysqli_error($con));
                    //jika database barang tidak kosong maka akan dilakukan loop
                    //pada while() untuk menampilkan semua data barang yang querynya tergantung
                    //dari query yang didapat dari variabel $query. Jika terjadi pencarian
                    //akan mendapat query yang berbeda daripada saat tidak terjadi pencarian
                    if(mysqli_num_rows($sql_barang)>0){
                        while($data = mysqli_fetch_array($sql_barang)){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['stok_barang']?></td>
                                <?php 
                                if($_SESSION['lv']==1){
                                    ?>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?=$data['id_barang']?>" class="btn btn-warning btn-xs">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <a href="delete.php?id=<?=$data['id_barang']?>" onclick="return confirm('Yakin aka nmenghapus data?')" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                    } else{
                        echo "<tr><td colspan=\"4\" align=\"center\" >Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
            if(isset($_POST['pencarian']) != ''){
                echo "<div style=\"float:left;\">";
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Data Hasil : <b>$jml</b>";
                echo "</div>";
            } else{ ?>
                <div style="float:left;">
                    <?php
                    $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                    echo "Jumlah Data : <b>$jml</b>";
                    ?>
                </div>
                <div style="float:right;">
                    <ul class="pagination pagination-sm" style="margin:0">
                        <?php
                        //ceil membulatkan hasil bagi KE ATAS, misal 4.2 jadi 5
                        //$jml_hal akan menampung banyaknya halaman yang diperlukan
                        //untuk semua item yang terdapat di database
                        //ataupun banyaknya item dari hasil pencarian
                        //$batas adalah batas banyaknya item yang akan ditampung di tiap page
                        $jml_hal = ceil($jml/$batas);
                        for($i=1;$i<=$jml_hal;$i++){
                            //$i adalah jumlah keseluruhan halaman yang ada
                            //jumlah dari isi variabel $i tergantung dari banyaknya variabel $jml_barang
                            //ditandai dengan "href=?hal=$i"
                            //jika posisi $i sama dengan $hal maka warna pada
                            //indikator nomor halaman kanan bawah akan berwarna biru
                            //yang mendandakan jika halaman sedang aktif.
                            //jika posisi $i tidak sama dengan $hal maka akan 
                            //berwarna putih yang menandakan jika halaman tersebut bukan halaman
                            //yang sedang dilihat oleh user.
                            if($i != $hal){
                                echo"<li><a href=\"?hal=$i\">$i</a></li>";
                            }else{
                                echo"<li class=\"active\"><a>$i</a></li>";
                            }
                        }
                        ?>
                        
                    </ul>
                </div>
               
                <?php
            }
        ?>
    </div>

<?php 
include_once "../_footer.php";
?>