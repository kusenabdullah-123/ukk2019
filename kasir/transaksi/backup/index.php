<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		

<?php require('head.php'); ?>
	</head>
	<body>
		<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../../index.php?pesan=gagal");
	}

	?>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					
			
					<span class="separator"></span>
			
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="../../assets/images/logo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/logo.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="">
								<span class="name">Admin</span>
								<span class="role">kasir</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
							
								
								<li>
									<a role="menuitem" tabindex="-1" href="../../logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
				require('sidebar.php');
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transaksi</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
					<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="" ></a>
									<a href="" ></a>
								</div>
						
								<h2 class="panel-title">Welcome <?php echo $_SESSION['username']; ?></h2>
							</header>
						</section>

							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr><th>NO</th>
											<td>ID Masakan</td>
											<th>Nama Masakan</th>
											<th>Harga</th>
											<th>Option</th>
										</tr>
									</thead>
								<?php 
require '../../koneksi.php';
$no = 0;
$sql = 'SELECT * FROM masakan';
$result = mysqli_query($koneksi, $sql);

 ?>
									<tbody>
										<tr class="gradeX">
		<?php while($product = mysqli_fetch_object($result)) {
			$no++; ?> 
		<td><?php echo $no;?></td>
		<td> <?php echo $product->id_masakan; ?> </td>
		<td> <?php echo $product->nama_masakan; ?> </td>
		<td> Rp.<?php echo $product->harga; ?> </td>
		<td> <a href="cart.php?id_masakan= <?php echo $product->id_masakan; ?> &action=add"><i class="fa fa-shopping-cart"></i> Pesan</a> </td>
										</tr>
										<?php } ?>
									</tbody>
									
								</table>
							</div>
							
		
<?php require('footer.php'); ?>


	</body>
</html>