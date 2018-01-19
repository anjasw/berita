	<?php
	if ($this->session->flashdata('insertstatus') == 'true') {
		echo "<div class='success'> Data Berhasil disimpan</div>";
	}else if ($this->session->flashdata('insertstatus') == 'false') {
		echo "<div class='error'> Data Gagal disimpan</div>";
	}
	if ($this->session->flashdata('deletestatus') == 'true') {
		echo "<div class='success'> Data Berhasil dihapus</div>";
	}else if ($this->session->flashdata('deletestatus') == 'false') {
		echo "<div class='error'> Data Gagal dihapus</div>";
	}
	?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3> <center>Data Penulis Berita</center></h3>
														<a href="<? echo base_url() ?>penulis/add">
															<button class="btn bg-blue waves-effect">
	                              <i class="material-icons">add</i>
	                              <span>Tambah Data</span>
	                            </button>
														</a>
														<form action="" method="get">
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
												<div class="form-line">
														<input type="text" name="q" class="form-control" value="<? echo $this->input->get('q')?>">
												</div>
										</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Search</button>
								</div>
						</div>
						</form>
                            <ul class="header-dropdown m-r--5">
                              <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="rotation" data-loading-color="lightBlue">
																	<i class="material-icons">loop</i>
															</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable">
                                    <thead>
																			<tr>
																				<th>No</th>
																				<th>Nama Penulis</th>
																				<th>Status</th>
																				<th>Dibuat Oleh</th>
																				<th>Tanggal Dibuat</th>
																				<th>Diupdate Oleh</th>
																				<th>Tanggal Diupdate</th>
																				<th>Fungsi</th>
																			</tr>
                                    </thead>
                                    <tbody>
																			<?php
																				if($data->num_rows()>0) {
																					$n = 1;
																					foreach ($data->result() as $row ){
																						echo"<tr>
																							<td>$n</td>
																							<td>$row->namapenulis</td>
																							<td>".$status[$row->status]['status']."</td>
																							<td>$row->__createdby</td>
																							<td>$row->__createddate</td>
																							<td>$row->__updatedby</td>
																							<td>".str_replace("0000-00-00 00:00:00", "-" ,$row->__updateddate )."</td>
																							<td><a href='".base_url()."penulis/edit/$row->idpenulis' class='btn blue'><i class='material-icons'>edit</i></a>
																							<a onclick='return is_delete()' href='".base_url()."penulis/delete/$row->idpenulis' class='btn red'><i class='material-icons'>delete</i></a>
																							</td>
																						</tr>";
																						$n++;
																					}
																				}
																			?>
                                    </tbody>
                                </table>
                            </div>
                            <nav>
      <ul class="pagination">
				<?php echo $pagging->create_links() ?>
			</ul>
		</nav>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
	function is_delete(){
		return confirm('Apakah Anda Mau menghapus data ?');
	}
</script>
