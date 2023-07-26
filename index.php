<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();

include 'config/database.php';
$sql="select * from profil_aplikasi limit 1";
$hasil = mysqli_query($kon,$sql);
$row = mysqli_fetch_array($hasil)

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $row['nama_aplikasi'];?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<!--slider-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/bootstrap/fonts/glyphicons-halflings-regular.woff2">
<!--//slider-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/etalage.css" type="text/css" media="all" />
<script src="js/jquery.etalage.min.js"></script>
<script>
  $(document).ready(function(){
    $('#myCarousel').carousel();
  });
</script>
<script>
	jQuery(document).ready(function($){

		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});
	});
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--script-->
<style>
        /* CSS untuk menambahkan gambar PNG sebagai background keseluruhan halaman */
        body {
            background-image: url("images/background-images.png");
            background-repeat: no-repeat;
            background-size: cover; 
		/* Atur gambar agar menutupi seluruh latar belakang */
        }
    </style>
</head>
<body> 
	<!--header-->
	<div class="header">
		<div class="bottom-header">
			<div class="container">
			<div class="header-bottom-left">
					<div class="logo">
						<a href="index.php"><img src="admin/pages/pengaturan-aplikasi/logo/<?php echo $row['logo']; ?>" alt=" " /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="index.php?page=profil"><span> </span>Akun Saya</a></div>
						<?php if (isset($_SESSION["id_pelanggan"])): ?>
							<ul class="login">
								<li><a href="index.php?page=logout"><span> </span>Keluar</a></li>
							</ul>
						<?php endif; ?>
						<?php if (!isset($_SESSION["id_pelanggan"])): ?>
							<ul class="login">
								<li><a href="index.php?page=login"><span> </span>Login</a></li>
							</ul>
						<?php endif; ?>

						<div class="cart"><a href="index.php?page=keranjang-belanja"><span> </span>Cart</a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- start content -->
	<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/banner.jpg" alt="Slide 1">
      <div class="carousel-caption">
        <h3>Gurls Club</h3>
        <p>Produk Baru</p>
      </div>
    </div>
    <div class="item">
      <img src="images/banner.jpg" alt="Slide 2">
      <div class="carousel-caption">
        <h3>Slide 2</h3>
        <p>Deskripsi Slide 2</p>
      </div>
    </div>
    <div class="item">
      <img src="images/banner.jpg" alt="Slide 3">
      <div class="carousel-caption">
        <h3>Slide 3</h3>
        <p>Deskripsi Slide 3</p>
      </div>
    </div>
  </div>
  <!-- Kontrol -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Sebelumnya</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Selanjutnya</span>
  </a>
</div>
	<?php 
      if(isset($_GET['page'])){
        $page = $_GET['page'];
    
        switch ($page) {
            case 'produk':
                include "pages/produk.php";
                break;
			case 'detail':
				include "pages/detail.php";
				break;
			case 'keranjang-belanja':
				include "pages/keranjang-belanja.php";
				break;
			case 'checkout':
				include "pages/checkout.php";
				break;
			case 'pembayaran':
				include "pages/pembayaran.php";
				break;
			case 'login':
				include "pages/login.php";
				break;
			case 'daftar':
				include "pages/daftar.php";
				break;
			case 'pesanan-saya':
				include "pages/menu-pelanggan/pesanan-saya.php";
				break;
			case 'detail-pesanan':
				include "pages/menu-pelanggan/detail-pesanan.php";
				break;
			case 'voucher-saya':
				include "pages/menu-pelanggan/voucher-saya.php";
				break;
			case 'profil':
				include "pages/menu-pelanggan/profil.php";
				break;
			case 'username-password':
				include "pages/menu-pelanggan/username-password.php";
				break;
			case 'logout':
				include "pages/logout.php";
				break;
          default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
      }else {
		include "pages/beranda.php";
	}
  	?>
	</div>
	<!---->
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="latter">
					<div class="sub-left-right">
						<form>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>KATEGORI</h6>
					<ul>
					<?php
                        //Koneksi database
                        include 'config/database.php';
                        $sql="select * from kategori order by id_kategori desc limit 7";
                        $hasil=mysqli_query($kon,$sql);
                        $no=0;
                        while ($data = mysqli_fetch_array($hasil)):
                        $no++;
                    ?>
						<li><a href="index.php?page=produk&kategori=<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori']; ?></a></li>
					<?php endwhile; ?>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
				<h6>SUB KATEGORI</h6>
					<ul>
					<?php
            
                        $sql="select * from sub_kategori order by id_sub_kategori desc limit 7";
                        $hasil=mysqli_query($kon,$sql);
                        $no=0;
                        while ($data = mysqli_fetch_array($hasil)):
                        $no++;
                    ?>
						<li><a href="index.php?page=produk&kategori=<?php echo $data['id_kategori'];?>&sub_kategori=<?php echo $data['id_sub_kategori'];?>"><?php echo $data['nama_sub_kategori']; ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="footer-bottom-cate">
				<?php 
					include 'config/database.php';
					$sql="select * from profil_aplikasi limit 1";
					$hasil = mysqli_query($kon,$sql);
					$row = mysqli_fetch_array($hasil)
				?>
					<h6>BANTUAN</h6>
					<ul>
						<li>Hubungi Kami melalui email : <?php echo $row['email'];?></li>
						<li>Telp : <?php echo $row['no_telp'];?></li>
					</ul>
					
				</div>
				<div class="footer-bottom-cate cate-bottom">
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>