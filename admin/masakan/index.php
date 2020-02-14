<!doctype html>
<html class="fixed">
	<head>
<?php
		require('head.php');
		?>


	</head>
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
					<a href="" class="logo">
						
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>
			
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="../../assets/images/logo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../../assets/images/logo.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">Admin</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
						
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
	require_once('sidebar.php');
	?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Masakan</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
					<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
							
								<h2 class="panel-title">Data</h2>
								<p><a href="" data-toggle="modal" class="btn btn-primary" data-target="#modaladd" > <span class="glyphicon glyphicon-plus"></span> Add Data</a></p>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Masakan</th>
											<th>Gambar</th>
											<th>harga</th>
											<th>Status</th>
											<th class="hidden-phone">Action</th>
										</tr>
									</thead>
								<?php 
  									//menampilkan data mysqli
 									 include "../koneksi.php";
 									 $no = 0;
 									 $modal=mysqli_query($koneksi,"SELECT * FROM masakan");
  									while($r=mysqli_fetch_array($modal)){
  									$no++;
       
									?>
									<tbody>
										<tr class="gradeX">
											<td><?php echo $no;?></td>
      										<td><?php echo  $r['nama_masakan']; ?></td>
      										<td><img src="uploads/<?php echo $r['gambar']; ?>" height="100" width="100"></td>
      										<td><?php echo  $r['harga']; ?></td>
      										<td><?php echo  $r['status_masakan']; ?></td>
      						<td>
         						<a href="#edit<?php echo $r['id_masakan']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
        						<a href="#" class="btn btn-danger" onclick="confirm_modal('proses_delete.php?&id_masakan=<?php echo  $r['id_masakan']; ?>');">
        							<span class="glyphicon glyphicon-trash"></span>Delete</a>
        							<?php include('modal.php'); ?>
     						</td>
										</tr>
									</tbody>
									<?php } ?>
								</table>
							</div>
						</section>

					
					<!-- end: page -->
					<!-- Modal Popup untuk add--> 
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
												</div>
												<div class="modal-body">
													 <form id="demo-form" class="form-horizontal mb-lg" action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Name</label>
														<div class="col-sm-9">
															<input type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">harga</label>
														<div class="col-sm-9">
															<input type="text" name="harga" class="form-control" placeholder="harga" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Status Masakan</label>
														<div class="col-sm-9">
															<input type="text" name="status_masakan" class="form-control" placeholder="Status" required/>
														</div>
													</div>
														<input type="file" name="gambar">
													<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Confirm</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												</form>
												</div>
												
											</div>
										</div>
									</div>
<!-- Delete Modal-->
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="masakan" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are You Sure To Delete This Data?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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





<?php
require('footer.php');
?>
	</body>
</html>
