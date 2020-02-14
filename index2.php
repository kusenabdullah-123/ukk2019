<!DOCTYPE html>
<html>
<head>
	<title>Welcome TO Restoran</title>
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" />
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['username']==""){
		header("location:login.php?pesan=gagal");
	}

	?>
		<?php
include('layout/nav2.php');
?>
		<!-- Tampilkan semua produk -->
		<div class="row">
		<!-- looping products -->
		<form action="" method="post">
		 		</thead>
								<?php 
require 'koneksi.php';
$no = 0;
$sql = 'SELECT * FROM masakan';
$result = mysqli_query($koneksi, $sql);

 ?>
 <?php while($product = mysqli_fetch_object($result)) {
			; ?> 
		  <div class="col-sm-3 col-md-3">
			<div class="thumbnail">
				<img src="admin/masakan/uploads/<?php echo $product->gambar; ?>" height="200px" width="200px" >
			  <div class="caption">
				<h3 style="min-height:60px;"><?php echo $product->nama_masakan; ?></h3><th></th>
				<th></th>
				<p>Rp.<?php echo $product->harga; ?></p>
				<p><?php echo $product->status_masakan; ?></p>
				<p><a class="btn btn-primary" href="cart.php?id_masakan= <?php echo $product->id_masakan; ?> &action=add"><i class="fa fa-shopping-cart"></i> Pesan</a></p>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		</form>
		<!-- end looping -->
		</div>
</body>
</html>