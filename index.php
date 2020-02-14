<!DOCTYPE html>
<html>
<head>
	<title>Welcome Toestoran</title>
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" />
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include('layout/nav.php');
?>
		
		<!-- Tampilkan semua produk -->
		<div class="row">
		<!-- looping products -->
		 <?php 
  									//menampilkan data mysqli
 									 include "koneksi.php";
 									 $modal=mysqli_query($koneksi,"SELECT * FROM masakan");
  									while($r=mysqli_fetch_array($modal)){
       
									?>
		  <div class="col-sm-3 col-md-3">
			<div class="thumbnail">
				<img src="admin/masakan/uploads/<?php echo $r['gambar']; ?>" height="200px" width="200px" >
			  <div class="caption">
				<h3 style="min-height:60px;"><?php echo  $r['nama_masakan']; ?></h3>
				<p>Harga : <?php echo  $r['harga']; ?></p>
				<p>Status: <?php echo  $r['status_masakan']; ?></p>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		<!-- end looping -->
		</div>
</body>
</html>