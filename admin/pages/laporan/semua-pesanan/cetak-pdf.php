<?php
session_start();
require('../../../plugins/fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm', 'letter'); // Format kertas A4

//Membuat Koneksi ke database akademik
include '../../../../config/database.php';

$query = mysqli_query($kon, "select * from profil_aplikasi order by nama_aplikasi desc limit 1");
$row = mysqli_fetch_array($query);

$pdf->AddPage();
$pdf->Image('fotobackground/background.png', 0, 0, 210, 297);
//Membuat header
$pdf->SetFont('Arial', 'B', 21);
$pdf->Cell(0, 7, strtoupper($row['nama_aplikasi']), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 7, $row['alamat'] . ', Telp ' . $row['no_telp'], 0, 1, 'C');
$pdf->Cell(0, 7, $row['website'], 0, 1, 'C');

//Membuat garis (line)
$pdf->SetLineWidth(1);
$pdf->Line(10, 31, 200, 31); // Mengubah panjang garis menjadi 200 (untuk kertas A4)
$pdf->SetLineWidth(0);
$pdf->Line(10, 32, 200, 32); // Mengubah panjang garis menjadi 200 (untuk kertas A4)

$tanggal = '';
if (!empty($_GET["dari_tanggal"]) && empty($_GET["sampai_tanggal"])) {
    $tanggal = date("d/m/Y", strtotime($_GET["dari_tanggal"]));
}
if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
    $tanggal = date("d/m/Y", strtotime($_GET["dari_tanggal"])) . " - " . date("d/m/Y", strtotime($_GET["sampai_tanggal"]));
}
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, 'Laporan Penjualan Tanggal: ', 0, 0);
$pdf->Cell(30, 6, $tanggal, 0, 1);

$pdf->Cell(10, 3, '', 0, 1);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(20, 6, 'Nomor', 1, 0, 'C');
$pdf->Cell(21, 6, 'Tanggal', 1, 0, 'C');
$pdf->Cell(80, 6, 'Produk', 1, 0, 'C');
$pdf->Cell(8, 6, 'QTY', 1, 0, 'C');
$pdf->Cell(26, 6, 'Harga', 1, 0, 'C');
$pdf->Cell(35, 6, 'Status', 1, 1, 'C');
$no = 1;
$sub_total = 0;
$total = 0;
$status = '';
$kondisi = "";

if (!empty($_GET["dari_tanggal"]) && empty($_GET["sampai_tanggal"])) $kondisi = "where date(p.tanggal)='" . $_GET['dari_tanggal'] . "' ";
if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) $kondisi = "where date(p.tanggal) between '" . $_GET['dari_tanggal'] . "' and '" . $_GET['sampai_tanggal'] . "'";


$sql = "select p.*, k.nama_produk,d.*,t.*,p.status as status_pesanan
    from pesanan p
    inner join pesanan_detail d on p.nomor_pesanan=d.nomor_pesanan
    inner join produk k on k.kode_produk=d.kode_produk
    inner join kategori t on t.id_kategori=k.kategori
    $kondisi
    order by p.tanggal desc";

$hasil = mysqli_query($kon, $sql);
$no = 1;
$status = '';
$pdf->SetFont('Arial', '', 8);
//Menampilkan data dengan perulangan while
while ($data = mysqli_fetch_array($hasil)):

    switch ($data['status_pesanan']) {
        case '6':
            $status = 'Ditahan';
            break;
        case '1':
            $status = 'Pembayaran tertunda';
            break;
        case '2':
            $status = 'Sedang diproses';
            break;
        case '3':
            $status = 'Selesai';
            break;
        case '4':
            $status = 'Dibatalkan';
            break;
        case '5':
            $status = 'Dana dikembalikan';
            break;
        default:
            $status = '-';
    }


    $pdf->Cell(8, 6, $no, 1, 0);
    $pdf->Cell(20, 6, $data['nomor_pesanan'], 1, 0);
    $pdf->Cell(21, 6, date('d-m-Y', strtotime($data["tanggal"])), 1, 0);
    $pdf->Cell(80, 6, $data['nama_produk'], 1, 0);
    $pdf->Cell(8, 6, $data['qty'], 1, 0);
    $pdf->Cell(26, 6, 'Rp. ' . number_format($data['harga'], 0, ',', '.'), 1, 0,);
    $pdf->Cell(35, 6, $status, 1, 1);
    $no++;
endwhile;

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(0,7,'Total Pemasukan : '.'Rp. '.number_format($total_pemasukan,0,',','.'),0,1);
//$pdf->Cell(0,7,'Total Pengeluaran : '.'Rp. '.number_format($total_pengeluaran,0,',','.'),0,1);

// Tambahkan garis bawah
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Mengubah posisi garis bawah di ujung bawah tabel (untuk kertas A4)
$pdf->SetLineWidth(0);

// Tambahkan tanda tangan
$pdf->SetY(-30); // Geser ke atas sejauh 30mm dari bawah (1 cm = 10mm, jadi 3cm = 30mm)
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, 'Rian Hapsarah', 0, 1, 'R'); // Menempatkan tanda tangan di pojok kanan bawah

$pdf->Output();
?>

<?php
function tanggal($tanggal)
{
    $bulan = array(1 => 'Januari',
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
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
?>
