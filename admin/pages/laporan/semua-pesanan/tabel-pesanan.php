<style>
  th {
    text-align: center;
  }
</style>

<?php
session_start();
?>
<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>No Pesanan</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Nama Produk</th>
        <th>QTY</th>
        <th>Harga</th>
        <th>Status</th>
    </tr>
    <?php

        // include database
        include '../../../../config/database.php';

        $kondisi="";
        if (!empty($_POST["dari_tanggal"]) && empty($_POST["sampai_tanggal"])) $kondisi= "where date(p.tanggal)='".$_POST['dari_tanggal']."' ";
        if (!empty($_POST["dari_tanggal"]) && !empty($_POST["sampai_tanggal"])) $kondisi= "where date(p.tanggal) between '".$_POST['dari_tanggal']."' and '".$_POST['sampai_tanggal']."'";
       
        $sql="select p.*, k.nama_produk,d.*,t.*,p.status as status_pesanan
        from pesanan p
        inner join pesanan_detail d on p.nomor_pesanan=d.nomor_pesanan
        inner join produk k on k.kode_produk=d.kode_produk
        inner join kategori t on t.id_kategori=k.kategori
        $kondisi
        order by p.tanggal desc";
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        $status="";
        //Menampilkan data dengan perulangan while
        while ($data = mysqli_fetch_array($hasil)):
        $no++;

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
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $data['nomor_pesanan']; ?></td>
    <td align="center"><?php echo tanggal(date('Y-m-d', strtotime($data['tanggal']))); ?></td>
    <td align="center"><?php echo $data['nama_kategori']; ?></td>
    <td align="left"><?php echo $data['nama_produk']; ?></td>
    <td align="center"><?php echo $data['qty']; ?></td>
    <td align="right">Rp. <?php echo number_format($data['harga'] * $data['qty'], 0, ',', '.'); ?></td>
    <td align="right"><?php echo $status; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<a href="pages/laporan/semua-pesanan/cetak-pdf.php?dari_tanggal=<?php if (!empty($_POST["dari_tanggal"])) echo $_POST["dari_tanggal"]; ?>&sampai_tanggal=<?php if (!empty($_POST["sampai_tanggal"])) echo $_POST["sampai_tanggal"]; ?>" target='blank' class="btn btn-danger btn-icon-pdf"><span class="text"><i class="fas fa-file-pdf fa-sm"></i> Export PDF</span></a>
<a href="pages/laporan/semua-pesanan/cetak-excel.php?dari_tanggal=<?php if (!empty($_POST["dari_tanggal"])) echo $_POST["dari_tanggal"]; ?>&sampai_tanggal=<?php if (!empty($_POST["sampai_tanggal"])) echo $_POST["sampai_tanggal"]; ?>" target='blank' class="btn btn-success btn-icon-pdf"><span class="text"><i class="fas fa-file-excel fa-sm"></i> Export Excel</span></a>

<?php
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

