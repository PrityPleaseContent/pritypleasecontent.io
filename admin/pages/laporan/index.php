<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Laporan Semua Pesanan
    <small>Menampilkan Daftar Pesanan</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Laporan</a></li>
    <li class="active">Semua Pesanan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php 
    include "semua-pesanan/index.php";
?>
</section>
<!-- /.content -->

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



