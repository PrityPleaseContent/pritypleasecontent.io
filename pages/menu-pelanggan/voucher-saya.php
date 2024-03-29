<?php
    if (!isset($_SESSION["id_pelanggan"])){
        echo"<script> window.location.href = 'index.php?page=login&aut=login'; </script>";
        exit;
    }
?>

<div class="women-product">
    <div class=" w_content">
        <div class="women">
            <h3>Voucher Saya</h3>
     
            <div class="clearfix"> </div>	
        </div>
    </div>
    <!-- grids_of_4 -->

    <div class="grid-product">
    <?php 
    if (isset($_GET['aut'])) {
        if ($_GET['aut']=='tidak_tersedia'){
            echo"<div class='alert alert-danger'>Pesanan tidak tersedia.</div>";
        } 
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Tipe</th>
                <th>Nominal Potongan</th>
                <th>Berlaku</th>
            </tr>
            </thead>
            <tbody>
            <?php
                //Koneksi database
                include 'config/database.php';
                //perintah sql untuk menampilkan daftar pembayaran
                $id_pelanggan=$_SESSION["id_pelanggan"];
                $sql="select * from voucher v inner join penerima_voucher p on p.kode_voucher=v.kode_voucher where id_pelanggan='$id_pelanggan' order by id_voucher desc";
                $hasil=mysqli_query($kon,$sql);
                $jum = mysqli_num_rows($hasil);
                $no=0;
                //Menampilkan data dengan perulangan while
                while ($data = mysqli_fetch_array($hasil)):
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_voucher']; ?></td>
                        <td><?php echo $data['kode_voucher']; ?></td>
                        <td><?php echo $data['tipe'] == 1 ? 'Persentase' : 'Potongan Tetap'; ?></td>
                        <td>
                        <?php 
                            if ($data['tipe']==1){
                                echo $data['nominal']." %";
                            }else if($data['tipe']==2){
                                echo "Rp. ".number_format($data['nominal'],2,',','.'); 
                            }
                        
                        ?>
                        </td>
                        <td><?php echo date('d-m-Y', strtotime($data["berlaku"])); ?></td>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
        <?php 
        if ($jum<1){
            echo"<div class='alert alert-warning'>Anda tidak memiliki voucher</div>";
        } 
        ?>
	<div class="clearfix"> </div>
    </div> 
</div>



<?php include 'menu-pelanggan.php';?>
<div class="clearfix"> </div>

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