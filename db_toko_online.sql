-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 11.08
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `kode_admin` char(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jk` int(11) NOT NULL,
  `telp` char(14) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'foto_default.png',
  `status` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `kode_admin`, `nama_admin`, `jk`, `telp`, `alamat`, `email`, `foto`, `status`, `username`, `password`) VALUES
(19, '2101015', 'Admin', 1, '082322343', '-', 'admin@gmail.com', 'user5.png', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(35, 'Komputer'),
(37, 'Kamera &amp; Audio'),
(39, 'PC Accessories');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `nomor_pesanan` char(10) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `bank_asal` varchar(100) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `tanggal_transfer`, `nomor_pesanan`, `id_pembayaran`, `bank_asal`, `nama_rekening`, `jumlah_uang`, `gambar`) VALUES
(2, '2021-04-10', '21040037', 3, 'BNI', 'DIMAS', 34343, 'REEBOK Cf Rcf Cap - Legacy Red.PNG'),
(4, '2021-04-07', '21040038', 3, '2323', '2323', 2323, 'konfirmasi peminjaman pustaka.PNG'),
(5, '2021-04-10', '21040038', 3, '323', '232', 232, ''),
(6, '2021-04-11', '21040063', 5, 'BNI', 'Juan', 15233000, 'smartmockups_kgx5ba29.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jk` int(11) NOT NULL,
  `telp` char(14) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'foto_default.png',
  `status` int(11) NOT NULL DEFAULT 1,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `jk`, `telp`, `alamat`, `email`, `foto`, `status`, `username`, `password`) VALUES
(7, '2101007', 'FEBRIAN INDRA SAPUTRA', 1, '0834623234556', 'Miliran UH 2/219 RT 004 RW 002 Kel.Muja Muju, Kec.', 'febrian@gmail.com', 'foto_default.png', 1, 'bayu', 'a430e06de5ce438d499c2e4063d60fd6'),
(8, '2101008', 'NATALIA ARIANI', 2, '089343434333', 'Kricak Kidul RT 29 RW 07 Tegalrejo', 'natalia@gmail.com', 'foto_default.png', 1, 'erik1', '6a42dd6e7ca9a813693714b0d9aa1ad8'),
(12, '2101012', 'BUDI SANTOSO', 1, '087822443433', 'KRICAK KIDUL TR I / 999 RT 39/09', 'budi@gmail.com', 'foto_default.png', 1, 'budi', '00dfc53ee86af02e742515cdcf075ed3'),
(14, '2101013', 'JUAN BURNAMA', 0, '08938343434', 'Jl batu angus no 56', 'juan_burnama@gmail.com', 'foto_default.png', 1, 'juan', 'a94652aa97c7211ba8954dd15a3cf838');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(16) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_bank`, `nomor_rekening`, `nama_rekening`, `logo`) VALUES
(3, 'BCA', '8465457216', 'Setiawan Dimas', 'bca.png'),
(5, 'BNI', '3476569', 'Setiawan Dimas', '300px-BNI_logo.svg.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_voucher`
--

CREATE TABLE `penerima_voucher` (
  `id_penerima_voucher` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_voucher` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerima_voucher`
--

INSERT INTO `penerima_voucher` (`id_penerima_voucher`, `id_pelanggan`, `kode_voucher`, `aktif`) VALUES
(313, 8, 'PASTIBISA', 0),
(314, 7, 'PASTIBISA', 0),
(320, 12, '50RB', 1),
(321, 8, '50RB', 1),
(322, 7, '50RB', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pelanggan` char(10) NOT NULL,
  `nomor_pesanan` char(10) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_hp` char(14) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `estimasi_waktu` varchar(50) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  `potongan` bigint(20) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pelanggan`, `nomor_pesanan`, `status`, `tanggal`, `nama`, `nomor_hp`, `alamat`, `provinsi`, `kabupaten`, `kurir`, `jenis_layanan`, `estimasi_waktu`, `tarif`, `potongan`, `status_pembayaran`) VALUES
(62, '2101012', '21040062', 3, '2021-03-26 07:46:47', 'BUDI SANTOSO', '087822443433', 'KRICAK KIDUL TR I / 999 RT 39/09', 'DI Yogyakarta', 'Yogyakarta', 'jne', 'JNE City Courier', '1-2', 120000, 0, 1),
(63, '2101013', '21040063', 2, '2021-01-22 16:13:52', 'JUAN BURNAMA', '08938343434', 'Jl batu angus no 56', 'Banten', 'Lebak', 'jne', 'Ongkos Kirim Ekonomis', '6-7', 133000, 50000, 1),
(64, '2101013', '21040064', 0, '2021-04-11 16:27:11', 'JUAN BURNAMA', '08938343434', 'Jl batu angus no 56', 'Banten', 'Cilegon', 'tiki', 'Economy Service', '5', 68000, 0, 0),
(65, '2101013', '21040065', 0, '2021-02-17 09:05:13', 'JUAN BURNAMA', '08938343434', 'Jl batu angus no 56', 'Bengkulu', 'Bengkulu Tengah', 'jne', 'Ongkos Kirim Ekonomis', '7-8', 46000, 0, 1),
(66, '2101013', '21040066', 4, '2021-02-17 09:06:00', 'JUAN BURNAMA', '08938343434', 'Jl batu angus no 56', 'Banten', 'Lebak', 'jne', 'Ongkos Kirim Ekonomis', '6-7', 133000, 0, 1),
(67, '2101013', '21040067', 0, '2021-04-12 09:35:21', 'JUAN BURNAMA', '08938343434', 'Jl batu angus no 56', 'Banten', 'Lebak', 'jne', 'Ongkos Kirim Ekonomis', '6-7', 19000, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_pesanan_detail` int(11) NOT NULL,
  `nomor_pesanan` char(10) NOT NULL,
  `kode_produk` char(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_pesanan_detail`, `nomor_pesanan`, `kode_produk`, `qty`, `harga`) VALUES
(78, '21040062', 'P0153', 5, 13500000),
(79, '21040063', 'P0154', 1, 11300000),
(80, '21040063', 'P0151', 1, 700000),
(81, '21040063', 'P0156', 1, 3150000),
(82, '21040064', 'P0154', 1, 11300000),
(83, '21040065', 'P0151', 2, 700000),
(84, '21040066', 'P0153', 1, 13500000),
(85, '21040066', 'P0156', 1, 3150000),
(86, '21040067', 'P0150', 1, 99000),
(87, '21040067', 'P0001', 1, 230000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` char(9) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `sub_kategori` int(11) NOT NULL,
  `berat` float NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `kategori`, `sub_kategori`, `berat`, `stok`, `harga`, `keterangan`, `tanggal`, `gambar`) VALUES
(149, 'P0001', 'SONY MDR-ZX110AP Headphone', 37, 11, 800, 6, 230000, 'SONY MDR-ZX110AP mengombinasikan desain ergonomis dan inovasi teknologi audio baru untuk menunjang berbagai kebutuhan hiburan Anda. Headphone ini memiliki desain ringan dan ringkas serta bagian eracup yang dapat Anda putar untuk kenyamanan lebih saat penyimpanan dan bepergian. Anda juga dapat mengatur headband sesuai dengan ukuran kepala Anda sehingga Anda dapat merasakan kenyamanan maksimal saat penggunaan lama. Audio pada headphone ini juga didukung dengan rentang frekuensi lebar 12Hz-22kHz yang mampu memberikan bass mendalam, level menengah yang kaya, serta nada tinggi mengagumkan.', '2021-04-08', 'SONY MDR-ZX110AP Headphone.PNG'),
(150, 'P0150', 'JBL C150SI In-Ear Headphones - Black', 37, 11, 300, 6, 99000, 'JBL C150SI In-Ear Headphones with Mic merupakan headphone yang didesain sangat ringan dan memberikan bantalan yang sangat nyaman pada bagian dalam telinga Anda. Memberikan kualitas suara khas JBL yang menakjubkan, dengan koneksi port jack 3.5mm untuk menunjang performa musik terbaik. JBL menyematkan mic pada headphone ini untuk memudahkan Anda dalam menjawab telepon, serta warna-warnanya yang menarik sangat cocok untuk Anda yang berjiwa casual dalam kesehariannya.', '2021-04-08', 'JBL C150SI In-Ear Headphones with Mic - Black.PNG'),
(151, 'P0151', 'ANKER Soundcore Liberty Neo True', 37, 11, 300, 3, 700000, 'Anker Liberty Neo merupakan earbud canggih yang hadir dengan kombinasi desain nyaman dan teknologi terkini sehingga Anda dapat mendengarkan musik seharian tanpa perlu khawatir telinga Anda akan terasa sakit ataupun earbud mudah terjatuh saat digunakan. Earbud ini didesain untuk memberikan audio menakjubkan dan dapat Anda gunakan hingga 3.5 jam lamanya hanya dengan satu kali pengisian baterai. Sementara kotak penyimpanan earphone ini sendiri dapat Anda manfaatkan untuk mendengarkan hingga 9 jam lamanya. Ditambah dengan fitur IPX7, perlindungan untuk mencegah air, keringet dan beragam cairan yang dapat merusak komponen internal.', '2021-04-08', 'ANKER Soundcore Liberty Neo True Wireless Earphones.PNG'),
(152, 'P0152', 'ACER Aspire 5 A514-53-36N5', 35, 19, 3000, 5, 6800000, 'ACER Aspire 5 hadir dengan layar 14 inci, memiliki performa yang maksimal dilengkapi dengan prosesor Intel Core i3, menunjang kualitas komputasi Anda. Ditambah dengan kartu grafis Intel UHD, rasakan visual berkualitas saat Anda menatap layar untuk bekerja maupun bermain game. Mengemban RAM 4GB, meningkatkan kinerja dalam menjalankan perintah komputasi. Dengan slot SSD berkapasitas hingga 512GB yang memberikan Anda kemudahan dalam menyimpan data, foto, video dan aplikasi game untuk notebook Anda.', '2021-04-08', 'ACER Aspire 5 A514-53-36N5.PNG'),
(153, 'P0153', 'ACER Nitro 5 AN515-44-R2Z0', 35, 19, 4000, 4, 13500000, 'yang kokoh dengan layar IPS FHD yang begitu responsif sehingga gameplay Anda akan tampak begitu mulus. Anda juga merasakan teknologi mengesankan pada laptop ini yang dapat menyempurnakan setiap aspek gameplay Anda. Seperti pada keyboard yang didesain untuk memiliki respon cepat dengan jarak tekanan 1.6 mm serta tombol WASD dan tombol arah yang disorot untuk visibilitas yang lebih mudah. Nitro 5 juga menggunakan teknologi AcerCoolBoost yang dapat meningkatkan kecepatan kipas dan pendinginan hingga 9%.', '2021-04-08', 'ACER Nitro 5 AN515-44-R2Z0.PNG'),
(154, 'P0154', 'DELL Inspiron 14-5402', 35, 19, 4000, 3, 11300000, 'Dell Inspiron hadir dengan kombinasi desain menawan dan teknologi canggih untuk memenuhi kebutuhan Anda. Laptop ini memiliki layar berukuran 14&quot; dengan inovasi desain yang lebih modern dengan interior yang lebih halus dan eksterior yang begitu tipis. Anda juga dapat mengandalkan laptop ini untuk kebutuhan harian berkat prosesor kuat yang dapat menjalankan pengoperasian tanpa interupsi. Nikmati daya ekstra dan kinerja optimal setiap hari dari grafis diskrit opsional NVIDIA GeForce MX330 dengan memori grafis GDDR5 hingga 2GB.', '2021-04-08', 'DELL Inspiron 14-5402.PNG'),
(155, 'P0155', 'LOGITECH M545 Wireless Mouse', 39, 20, 200, 5, 350000, 'LOGITECH B170 Wireless Mouse - Black adalah mouse wireless yang memiliki koneksi wireless yang kuat dan konsisten dengan jarak hingga 10 meter atau 32 kaki, tanpa adanya gangguan yang terputus - putus. Membuat Anda dapat bekerja dan bermain dengan penuh percaya diri dan maksimal. Bentuk mouse yang mendukung bentuk tangan Anda agar tetap terasa nyaman selama penggunaan berjam-jam, serta ideal untuk pengguna bertangan kanan maupun kiri.', '2021-04-11', 'LOGITECH M545 Wireless Mouse.PNG'),
(156, 'P0156', 'Epson L4150 Wi-Fi All In One Printer', 39, 21, 3000, 5, 3150000, 'EPSON L4150 merupakan printer dengan kualitas premium yang dapat mencetak berbagai kebutuhan Anda dengan mudah. Produk ini memiliki hasil cetakan yang sempurna dan memiliki teknologi pencetakan cepat. Printer ini juga memiliki teknologi spill-free refilling yang dapat membantu Anda untuk mengganti tinta tanpa mengotori tangan Anda. Anda juga dapat mencetak dengan berbagai perangkat berkat fitur Wi-Fi pada produk ini', '2021-04-11', 'Epson L4150 Wi-Fi All In One Printer.PNG'),
(157, 'P0157', 'SanDisk Cruzer Force CZ71 32GB', 39, 22, 100, 9, 65000, 'Dengan Cruzer Force USB2.0, Anda akan mendapatkan kapasitas penyimpanan yang besar dan dengan desain yang stylish. SANDISK Cruzer Force USB2.0 memiliki desain yang ramping dan efisien dengan warna metalik yang menarik dan ukuran yang dapat disimpan dalam tas atau saku. Dengan kapasitas yang beragam, sangat cocok untuk Anda dalam menyimpan file  dengan kapasitas kecil hingga besar. Sandisk Cruzer Force pun hadir dengan SanDisk SecureAccess Software yang mampu mengamankan dokumen Anda. Software ini memungkinkan Anda untuk memproteksi folder penting menggunakan sebuah password.', '2021-04-11', 'SanDisk Cruzer Force CZ71 32GB.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_aplikasi`
--

CREATE TABLE `profil_aplikasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_aplikasi`
--

INSERT INTO `profil_aplikasi` (`id`, `nama_aplikasi`, `alamat`, `provinsi`, `kabupaten`, `no_telp`, `email`, `website`, `logo`) VALUES
(0, 'BIG Shope', 'Jl karangbendo no 56', 5, 39, '(021)7316111', 'big_shope@gmail.com', 'www.bigshope.com', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nomor_pesanan` char(10) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `tanggal`, `nomor_pesanan`, `status`, `keterangan`) VALUES
(72, '2021-04-09 07:46:47', '21040062', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran'),
(73, '2021-04-11 16:13:52', '21040063', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran'),
(74, '2021-04-11 16:17:13', '21040063', 2, 'Pesanan anda sedang kami proses'),
(75, '2021-04-11 16:27:11', '21040064', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran'),
(76, '2021-04-12 07:47:50', '21040062', 2, 'Pesanan anda sedang kami proses'),
(77, '2021-04-12 07:47:55', '21040062', 3, 'Kami telah selesai memproses pesanan Anda.'),
(78, '2021-04-12 09:05:13', '21040065', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran'),
(79, '2021-04-12 09:06:00', '21040066', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran'),
(80, '2021-04-12 09:08:19', '21040066', 4, 'Pesanan anda telah kami batalkan dengan alasan ...'),
(81, '2021-04-12 09:35:21', '21040067', 0, 'Pesanan anda sedang ditahan & menunggu pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`) VALUES
(11, 'Headphone', 37),
(19, 'Laptop', 35),
(20, 'Mouse', 39),
(21, 'Printer', 39),
(22, 'Flaskdisk', 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `nama_voucher` varchar(100) NOT NULL,
  `kode_voucher` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `nama_voucher`, `kode_voucher`, `tipe`, `nominal`, `berlaku`) VALUES
(27, 'PASTIBISA', 'PASTIBISA', 1, 20, '2021-04-28'),
(29, 'POTONGAN 50RB', '50RB', 2, 50000, '2021-04-30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_code` (`kode_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `penerima_voucher`
--
ALTER TABLE `penerima_voucher`
  ADD PRIMARY KEY (`id_penerima_voucher`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD UNIQUE KEY `kode_pesanan` (`nomor_pesanan`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `profil_aplikasi`
--
ALTER TABLE `profil_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`),
  ADD UNIQUE KEY `kode_voucher` (`kode_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penerima_voucher`
--
ALTER TABLE `penerima_voucher`
  MODIFY `id_penerima_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
