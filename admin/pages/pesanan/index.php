<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Daftar Pesanan
    <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Daftar Pesanan</li>
    </ol>
</section>

<!-- Main content -->   
<section class="content">

<?php
    if (isset($_GET['hapus'])) {
        $nomor_pesanan=$_GET['nomor_pesanan'];
        if ($_GET['hapus']=='berhasil'){
            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Pesanan dengan nomor $nomor_pesanan telah dihapus!</div>";
        }else if ($_GET['hapus']=='gagal'){
            echo"<div class='alert alert-danger'><strong>Gagal!</strong> Pesanan dengan nomor $nomor_pesanan gagal dihapus!</div>";
        }    
    }
?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- pesanan -->
            <div class="box box-success">
                <div class="box-header with-border">
              
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Status filter dropdown -->
                    <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="http://localhost/toko-online/toko-online/admin/index.php">
                            <div class="form-group">
                                <label for="status">Filter berdasarkan Status:</label>
                                <select class="form-control" name="status" id="status">
                                        <?php 
                                            // Status options for the dropdown
                                            $statusOptions = [
                                                '' => 'Semua', // An option to show all orders regardless of status
                                                '6' => 'Ditahan',
                                                '1' => 'Pembayaran tertunda',
                                                '2' => 'Sedang diproses',
                                                '3' => 'Selesai',
                                                '4' => 'Dibatalkan',
                                                '5' => 'Dana dikembalikan',
                                            ];

                                            // Get the selected status from the dropdown
                                            $selectedStatus = isset($_GET['status']) ? $_GET['status'] : '';

                                            // Loop through status options and generate dropdown
                                            foreach ($statusOptions as $value => $label) {
                                                $selected = ($selectedStatus == $value) ? 'selected' : '';
                                                echo "<option value='$value' $selected>$label</option>";
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" name="page" value="pesanan">
                                    <button type="submit" class="btn btn-primary mt-2">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Status filter dropdown -->

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Nomor</th>
                                    <th style="text-align: center;">Pelanggan</th>
                                    <th style="text-align: center;">Qty</th>
                                    <th style="text-align: center;">Kota Tujuan</th>
                                    <th style="text-align: center;">Pengiriman</th>
                                    <th style="text-align: center;">Layanan</th>
                                    <th style="text-align: center;">Total Bayar</th>
                                    <th style="text-align: center;">Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //Koneksi database
                                    include '../config/database.php';
                                    //perintah sql untuk menampilkan daftar pembayaran
                                    $jum=0;
                                    $sql = "SELECT p.*, p.status AS status_pesanan, n.nama_pelanggan FROM pesanan p INNER JOIN pelanggan n ON p.kode_pelanggan = n.kode_pelanggan";
                                    
                                    // Filter based on selected status
                                    if (!empty($selectedStatus)) {
                                        $sql .= " WHERE p.status = '$selectedStatus'";
                                    }

                                    $sql .= " ORDER BY id_pesanan DESC";

                                    $hasil=mysqli_query($kon,$sql);
                                    $jum = mysqli_num_rows($hasil);
                                    $no=0;
                                    $jum_produk=0;
                                    $total_bayar=0;
                                    $status="";
                               
                                    //Menampilkan data dengan perulangan while
                                    while ($data = mysqli_fetch_array($hasil)):
                                        $no++;
                                        $nomor_pesanan=$data['nomor_pesanan'];
                                        $result=mysqli_query($kon,"SELECT DISTINCT nomor_pesanan, SUM(qty) AS jum, SUM(harga*qty) AS total_harga FROM pesanan_detail WHERE nomor_pesanan='$nomor_pesanan' GROUP BY nomor_pesanan");
                                        
                                        while ($row = mysqli_fetch_array($result)):
                                        
                                            $tanggal=date("Y-m-d",strtotime($data["tanggal"]));
                    
                                            switch ($data['status_pesanan']){
                                                case '6' : $status='Ditahan';break;
                                                case '1' : $status='Pembayaran tertunda';break;
                                                case '2' : $status='Sedang diproses';break;
                                                case '3' : $status='Selesai';break;
                                                case '4' : $status='Dibatalkan';break;
                                                case '5' : $status='Dana dikembalikan';break;
                                                default :  $status='-';
                                            }
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                    <td style="text-align: center;"><?php echo tanggal($tanggal); ?></td>
                                    <td style="text-align: center;"><?php echo $data['nomor_pesanan']; ?></td>
                                    <td><?php echo $data['nama_pelanggan']; ?></td>
                                    <td style="text-align: center;"><?php echo $row['jum']; ?></td>
                                    <td style="text-align: center;"><?php echo $data['kabupaten']; ?>, <?php echo $data['provinsi']; ?></td>
                                    <td style="text-align: center;"><?php echo strtoupper($data['kurir']); ?></td>
                                    <td style="text-align: center;"><?php echo $data['jenis_layanan']; ?></td>
                                    <td style="text-align: right;">Rp. <?php echo number_format(($row['total_harga']+$data['tarif'])-$data['potongan'],0,',','.'); ?></td>
                                    <td style="text-align: left;"><?php echo $status; ?></td>
                                    <td>  
                                        <a href="index.php?page=detail-pesanan&nomor_pesanan=<?php echo $data['nomor_pesanan']; ?>" class="btn btn-primary btn-circle" ><i class="fa fa-mouse-pointer"></i></a>
                                        <a href="pages/pesanan/hapus.php?nomor_pesanan=<?php echo $data['nomor_pesanan']; ?>" class="tombol_hapus btn btn-danger btn-circle" ><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    endwhile;
                                    endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        if ($jum < 1) {
                            echo "<div class='alert alert-info'>Belum ada pesanan yang masuk</div>";
                        }
                    ?>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- jQuery 3 -->


<?php 
    //Membuat format tanggal
    function tanggal($tanggal)
    {
        $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

?>


<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="judul"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <div id="tampil_data">
                 <!-- Data akan di load menggunakan AJAX -->                   
            </div>  
        </div>
  
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
</div>


<script>
    // Tambah pembayaran
    $('#tambah').on('click',function(){
        $.ajax({
            url: 'pages/pembayaran/tambah.php',
            method: 'post',
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Tambah Pembayaran';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
    // Edit pembayaran
    $('.tombol_edit').on('click',function(){
        var id_pembayaran = $(this).attr("id_pembayaran");
        $.ajax({
            url: 'pages/pembayaran/edit.php',
            method: 'post',
            data: {id_pembayaran:id_pembayaran},
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Edit Pembayaran';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
   // fungsi hapus 
   $('.tombol_hapus').on('click',function(){
        konfirmasi=confirm("Yakin ingin menghapus pesanan ini?")
        if (konfirmasi){
            return true;
        } else {
            return false;
        }
    });
</script>
