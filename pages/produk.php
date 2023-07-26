<div class="women-product">
    <div class=" w_content">
        <div class="women">
        <div class="clearfix"> </div>	
        </div>
    </div>
    <!-- grids_of_4 -->

    <div class="grid-product">
    <?php 
        include 'config/database.php';
        if (isset($_GET['kategori']) && isset($_GET['sub_kategori'])) {

            $kategori=$_GET['kategori'];
            $sub_kategori=$_GET['sub_kategori'];
            $sql="select * from produk where kategori='$kategori' and sub_kategori='$sub_kategori' and stok !=0";
        }else if (isset($_GET['kategori'])){

            $kategori=$_GET['kategori'];
            $sql="select * from produk where kategori='$kategori' and stok !=0";
        }else {
            $sql="select * from produk where stok !=0";
        }
        
        $hasil=mysqli_query($kon,$sql);
        $jum = mysqli_num_rows($hasil);

        if ($jum<1){
            echo "<div class='alert alert-info'>Produk tidak tersedia.</div>";
        }

        $no=0;
        while ($data = mysqli_fetch_array($hasil)):
        $no++;
    ?>
			<div class="  product-grid">
                <div class="content_box"><a href="index.php?page=detail&id=<?php echo $data['id_produk']; ?>">
                    <div class="left-grid-view grid-view-left">
                        <img src="admin/pages/produk/gambar/<?php echo $data['gambar'];?>" class="img-responsive watch-right" alt=""/>
           
                        </a>
                    </div>
                    <h4><a href="index.php?page=detail&id=<?php echo $data['id_produk']; ?>"> <?php echo $data['nama_produk'];?></a></h4>
                    <p><?php echo substr($data['keterangan'],0,80); ?></p>
                    Rp. <?php echo number_format($data['harga'],0,',','.'); ?>
			   	</div>
            </div>
          
            <?php endwhile; ?>
			<div class="clearfix"> </div>
		</div>
        
</div>
<?php include 'kategori.php';?>
<div class="clearfix"> </div>