


<!-- EDIT -->
<div class="modal fade" id="edit<?php echo $r['id_masakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
												</div>
												<div class="modal-body">
													<?php
				include('../koneksi.php');
					$edit=mysqli_query($koneksi,"SELECT * from masakan where id_masakan='".$r['id_masakan']."'");
					$erow=mysqli_fetch_array($edit);
				?>
													 <form enctype="multipart/form-data" method="POST" action="edit.php?id_masakan=<?php echo $erow['id_masakan']; ?>">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Name</label>
														<div class="col-sm-9">
															<input type="hidden" name="id_masakan" value="<?php echo $erow['id_masakan']; ?>">
							<input type="text" name="nama_masakan" class="form-control" value="<?php echo $erow['nama_masakan']; ?>" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">harga</label>
														<div class="col-sm-9">
															<input type="text" name="harga" class="form-control" value="<?php echo $erow['harga']; ?>" required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Status Masakan</label>
														<div class="col-sm-9">
															<input type="text" name="status_masakan" class="form-control" value="<?php echo $erow['status_masakan']; ?>" required/>
														</div>
													</div>
													<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="ganti" type="checkbox"/>
										<label for="RememberMe">Ganti Foto</label>
									
									</div>
									<div>
						<input type="file" name="gambar">
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
    