<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS
		<link rel="stylesheet" href="../../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" /
		 -->
		<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.css" />
	

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		>
		<link rel="stylesheet" href="../../assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="../../assets/vendor/pnotify/pnotify.custom.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../../assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body>
		<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
	}

	?>
	<?php
	include "../koneksi.php";
	$id_user=$_GET['id_user'];
	mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id_user'");
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
								<img src="../../assets/images/logo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../../assets/images/logo.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="">
								<span class="name">Admin</span>
								<span class="role">administrator</span>
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
								<li><span>Data User</span></li>
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
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									
								</div>
							<h2 class="panel-title">Data User</h2>
							<br>

							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama User</th>
											<th>Username</th>
											<th>Level</th>
											<th>Action</th>
										</tr>
									</thead>
								<?php 
  									//menampilkan data mysqli
 									 include "../koneksi.php";
 									 $no = 0;
 									 $user=mysqli_query($koneksi,"SELECT * FROM user");
  									while($r=mysqli_fetch_array($user)){
  									$no++;
       
									?>
									<tbody>
										<tr class="gradeX">
											<td><?php echo $no;?></td>
      										<td><?php echo  $r['nama_user']; ?></td>
      										
      										<td><?php echo  $r['username']; ?></td>
      										<td><?php echo  $r['level']; ?></td>
      						<td> 
        						<a href="#" class="btn btn-danger" onclick="confirm_modal('datauser.php?&id_user=<?php echo  $r['id_user']; ?>');">
        							<span class="glyphicon glyphicon-trash"></span>Delete</a>
     						</td>
										</tr>
									</tbody>
									<?php } ?>
								</table>
							</div>
						</section>	
						
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="masakan" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are You Sure To Delete This Data ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link"><span class="glyphicon glyphicon-trash"></span>Delete</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Popup untuk delete--> 

		<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>			
		<script src="../../assets/vendor/jquery/jquery.js"></script>
		<script src="../../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="../../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="../../assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="../../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="../../assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="../../assets/vendor/flot/jquery.flot.js"></script>
		
		<script src="../../assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../../assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../../assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>
