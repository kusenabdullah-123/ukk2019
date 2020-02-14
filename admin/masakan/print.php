<!doctype html>
<html class="fixed">
	<head>
<title></title>

	</head>
	<body>

		
			<!-- end: header -->
<center><h2>Data Masakan</h2>
	<p>==============================================</p>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Masakan</th>
											<th>Harga</th>
											<th>Status</th>

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
      										<td>Rp.<?php echo  $r['harga']; ?></td>
      										<td><?php echo  $r['status_masakan']; ?></td>
      						
										</tr>
									</tbody>
									<?php } ?>
								</table>
							</center>

							
<script type="text/javascript">
			window.print();
		</script>

		
	</body>
</html>
