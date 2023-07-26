<?php
 
    include '../../../config/database.php';
    //Memulai transaksi
    mysqli_query($kon,"START TRANSACTION");

    $nomor_pesanan=$_GET['nomor_pesanan'];

    //Menghapus data pesanan
    $hapus_pesanan=mysqli_query($kon,"delete from pesanan where nomor_pesanan='$nomor_pesanan'");

    $hapus_detail_pesanan=mysqli_query($kon,"delete from pesanan_detail where nomor_pesanan='$nomor_pesanan'");

    $hapus_status=mysqli_query($kon,"delete from status where nomor_pesanan='$nomor_pesanan'");
    
    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hapus_pesanan and $hapus_detail_pesanan and $hapus_status) {
        mysqli_query($kon,"COMMIT");
        header("Location:../../index.php?page=pesanan&nomor_pesanan=$nomor_pesanan&hapus=berhasil");
    }
    else {
        mysqli_query($kon,"ROLLBACK");
        header("Location:../../index.php?page=pesanan&nomor_pesanan=$nomor_pesanan&hapus=gagal");

    }
        
    
?>