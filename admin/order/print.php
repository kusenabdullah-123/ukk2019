<!doctype html>
<html class="fixed">
	<head>
<title></title>

	</head>
	<body>

		
			<!-- end: header -->
<center><h2>Data Order</h2>
	<p>==============================================</p>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>keterangan</th>
											<th>Status Order</th>
										</tr>
									</thead>
								<?php 
  									//menampilkan data mysqli
 									 include "../koneksi.php";
 									 $no = 0;
 									 $modal=mysqli_query($koneksi," SELECT * FROM `order` ");
  									while($r=mysqli_fetch_array($modal)){
  									$no++;
       
									?>
									<tbody>
										<tr class="gradeX">
									<td><?php echo $no;?></td>
      								<td><?php echo  $r['tanggal']; ?></td>
      								<td><?php echo  $r['keterangan']; ?></td>
      								<td><?php echo  $r['status_order']; ?></td>
										</tr>
									</tbody>
									<?php } ?>
								</table>
							</div>
						</section>

					
					<!-- end: page -->

<!-- Modal Popup untuk delete--> 

		<script type="text/javascript">
    window.print();
</script>
		
		
	</body>
</html>
