<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <div id="filter_laporan" class="collapse show">
                <!-- form -->
                <form method="post" id="form">
                    <div class="form-row">
                        <div class="col-sm-3">
                        <input type="date" class="form-control" name="dari_tanggal" required>
                        </div>
                        <div class="col-sm-3">
                        <input type="date" class="form-control"  name="sampai_tanggal" required>
                        </div>
                        <div class="col-sm-3">
                        <button  type="button" id="btn-tampil"  class="btn btn-success"><span class="text"> Tampilkan</span></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <!-- Tampil Laporan -->
            <div id="tampil_laporan">
    
            </div>

        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
<div id='ajax-wait'>
    <img alt='loading...' src='dist/img/Rolling-1s-84px.png' />
</div>
<style>
    #ajax-wait {
        display: none;
        position: fixed;
        z-index: 2300
    }
</style>

<script>

$('#btn-tampil').on('click',function(){
    $( document ).ajaxStart(function() {
    $( "#ajax-wait" ).css({
        left: ( $( window ).width() - 32 ) / 2 + "px", // 32 = lebar gambar
        top: ( $( window ).height() - 32 ) / 2 + "px", // 32 = tinggi gambar
        display: "block"
    })
    })
    .ajaxComplete( function() {
        $( "#ajax-wait" ).fadeOut();
    });

    var data = $('#form').serialize();
        $.ajax({
            type	: 'POST',
            url: 'pages/laporan/semua-pesanan/tabel-pesanan.php',
            data: data,
            cache	: false,
            success	: function(data){
                $("#tampil_laporan").html(data);

            }
        });
});

</script>
