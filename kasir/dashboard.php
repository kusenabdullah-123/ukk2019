<!doctype html>
<html class="fixed">
	<?php
	require('header.php');
	?>
	<body>
		<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
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
								<img src="../assets/images/logo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/logo.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="">
								<span class="name">Admin</span>
								<span class="role">Kasir</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
							
								
								<li>
									<a role="menuitem" tabindex="-1" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
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
								<li><span>Dashboard</span></li>
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
							
		<?php
		require('footer.php');
		?>
	</body>
</html>
