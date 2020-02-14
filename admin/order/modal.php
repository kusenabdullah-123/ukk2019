


<!-- EDIT -->
<div class="modal fade" id="edit<?php echo $r['id_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
												</div>
												<div class="modal-body">
													<?php
				include('../koneksi.php');
					$edit=mysqli_query($koneksi,"SELECT * from `order` where id_order='".$r['id_order']."'");
					$erow=mysqli_fetch_array($edit);
				?>
													 <form enctype="multipart/form-data" method="POST" action="edit.php?id_order=<?php echo $erow['id_order']; ?>">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Tanggal</label>
														<div class="col-sm-9">
															<input type="hidden" name="id_order" value="<?php echo $erow['id_order']; ?>">
							<input type="date" name="tanggal" class="form-control" value="<?php echo $erow['tanggal']; ?>" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">keterangan</label>
														<div class="col-sm-9">
															<input type="text" name="keterangan" class="form-control" value="<?php echo $erow['keterangan']; ?>" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">status_order</label>
														<div class="col-sm-9">
															<input type="text" name="status_order" class="form-control" value="<?php echo $erow['status_order']; ?>" required/>
														</div>
													</div>
													<!--
														<input type="file" name="gambar">-->
													<div class="modal-footer">
													<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>Confirm</button>
													<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
												</div>
												</form>
												</div>
												
											</div>
										</div>
    </div>