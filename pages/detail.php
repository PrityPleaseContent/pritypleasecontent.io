<div class=" single_top">
	<?php 
	include 'config/database.php';
	$id_produk=$_GET['id'];
	$hasil=mysqli_query($kon,"select * from produk where id_produk='$id_produk' limit 1");
	$data = mysqli_fetch_array($hasil);

?>
	<div class="single_grid">
		<div class="grid images_3_of_2">
				<ul id="etalage">
					<li>
						<a href="optionallink.html">
							<img class="etalage_thumb_image" src="admin/pages/produk/gambar/<?php echo $data['gambar'];?>" class="img-responsive" />
							<img class="etalage_source_image" src="admin/pages/produk/gambar/<?php echo $data['gambar'];?>" class="img-responsive" title="" />
						</a>
					</li>
				</ul>
					<div class="clearfix"> </div>		
			</div> 
		<div class="desc1 span_3_of_2">
			<form method="get" action="">
				<h4><?php echo $data['nama_produk'];?></h4>
				<div class="cart-b">
					<div class="left-n ">Rp. <?php echo number_format($data['harga'],0,',','.'); ?></div>
					<input type="submit" id="masukan_keranjang" class="btn btn-danger now-get get-cart-in" value="MASUKAN KERANJANG">
					<div class="clearfix"></div>
				</div>
				<div class="alert alert-danger" id="notifikasi">Jumlah beli tidak boleh melebihi stok produk.</div>
				<div class="input-group">
					<span class="input-group-addon">Jumlah</span>
					<input  type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" max="<?php echo $data['stok']; ?>"  placeholder="Masukan jumlah beli" required>
				</div>
				<div class="input-group">
                    <span class="input-group-addon">Ukuran</span>
                    <select name="ukuran" id="ukuran" class="form-control" required>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Stok Tersedia:</span>
                    <span id="stokTersedia" data-stok-s="<?php echo isset($data['stok_s']) ? $data['stok_s'] : 0; ?>" data-stok-m="<?php echo isset($data['stok_m']) ? $data['stok_m'] : 0; ?>" data-stok-l="<?php echo isset($data['stok_l']) ? $data['stok_l'] : 0; ?>" data-stok-xl="<?php echo isset($data['stok_xl']) ? $data['stok_xl'] : 0; ?>"></span>
                </div>
				<div class="input-group">
					<input type="hidden" name="page" value="keranjang-belanja" />
					<input type="hidden" name="kode_produk" value="<?php echo $data['kode_produk'];?>"/>
					<input type="hidden" name="aksi" value="tambah_produk"/>
				</div>
	
				<h6><?php echo $data['stok'];?> Stok Tersedia</h6>
				<input type="hidden" id="stok" value="<?php echo $data['stok'];?>"/>
				<p><?php echo $data['keterangan'];?></p>
				<div class="share">
					<h5>Share Product :</h5>
					<ul class="share_nav">
						<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
						<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
					</ul>
				</div>
			</form>
		</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	
	<!---->
	<?php include 'kategori.php';?>

<div class="clearfix"> </div>

<script>
    $(document).ready(function(){
		$('#notifikasi').hide();
    });
</script>

<script>
    $('#jumlah').bind('keyup', function () {
		validasi();
    }); 

	$('#jumlah').bind('change', function () {
		validasi();
    });


	function validasi(){
		var jumlah = parseInt($("#jumlah").val());
		var stok = parseInt($("#stok").val());

		if (jumlah>stok){
			$('#notifikasi').show(400);
			document.getElementById("masukan_keranjang").disabled = true;
		}else {
			$('#notifikasi').hide(400);
			document.getElementById("masukan_keranjang").disabled = false;
		}
	}
	function updateStok(ukuran){
        var stokS = parseInt($("#stokTersedia").data("stok-s"));
        var stokM = parseInt($("#stokTersedia").data("stok-m"));
        var stokL = parseInt($("#stokTersedia").data("stok-l"));
        var stokXL = parseInt($("#stokTersedia").data("stok-xl"));

        var stokTersedia;

        if (ukuran === 'S') {
            stokTersedia = stokS;
        } else if (ukuran === 'M') {
            stokTersedia = stokM;
        } else if (ukuran === 'L') {
            stokTersedia = stokL;
        } else if (ukuran === 'XL') {
            stokTersedia = stokXL;
        }

        if (stokTersedia === 0) {
            $("#stokTersedia").text("Stok Habis");
            document.getElementById("masukan_keranjang").disabled = true;
        } else {
            $("#stokTersedia").text(stokTersedia);
            document.getElementById("masukan_keranjang").disabled = false;
        }
    }

    // Saat halaman dimuat, tampilkan stok S sebagai default
    updateStok($("#ukuran").val());

    // Ketika ukuran berubah, perbarui tampilan stok berdasarkan ukuran yang dipilih
    $("#ukuran").on("change", function(){
        updateStok($(this).val());
    });
</script>