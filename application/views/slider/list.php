<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h3> <center>Gambar Slider</center></h3>
				<a href="<? echo base_url() ?>slider/add">
					<button class="btn bg-blue waves-effect">
	          <i class="material-icons">add</i>
	          <span>Tambah Gambar</span>
	        </button>
				</a>
				<?php
					if ($this->session->flashdata('insertstatus') == 'true') {
						echo "<div class='success'> Data Berhasil disimpan</div>";
					}else if ($this->session->flashdata('insertstatus') == 'false') {
						echo "<div class='qwerty'> Gambar Harus Dipilih..</div>";
					}
					if ($this->session->flashdata('deletestatus') == 'true') {
						echo "<div class='success'> Data Berhasil dihapus</div>";
					}else if ($this->session->flashdata('deletestatus') == 'false') {
						echo "<div class='qwerty'> Data Gagal dihapus</div>";
					}
				?>
					<ul class="header-dropdown m-r--5">
						<a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="rotation" data-loading-color="lightBlue">
								<i class="material-icons">loop</i>
						</a>
					</ul>
			</div>
			<div class="body">
				<div class="table-responsive">
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered table-striped table-hover js-basic-example">
								<thead>
									<tr>
										<th>No</th>
										<th class="col-lg-2">
											<center>Gambar</center>
										</th>
										<th class="col-lg-4">
											<center>Judul Slider</center>
										</th>
										<th class="col-lg-3">
											<center>Tanggal Dibuat</center>
										</th>
										<th class="col-lg-1">
											<center>Status Gambar</center>
										</th>
										<th class="col-lg-2">
											<center>Fungsi</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if($data->num_rows()>0) {
											$n = 1;
											foreach ($data->result() as $row ){
												echo"<tr>
													<td><center>$n</center></td>
													<td><center><img src='".base_url()."assets/images/$row->image' width='100%' class='waves-circle'></center></td>
													<td>$row->judul</td>
													<td><center>$row->__createddate</center></td>
													<td><center>".$status[$row->status]['status']."</center></td>
													<td><center><a href='".base_url()."slider/edit/$row->idslider' class='btn blue'><i class='material-icons'>edit</i></a>
													<a onclick='return is_delete()' href='".base_url()."slider/delete/$row->idslider' class='btn red'><i class='material-icons'>delete</i></a>
													</center></td>

													</tr>";
													$n++;
												}
											}
										?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function is_delete() {
		return confirm('Apakah Anda Mau menghapus data ?');
	}
</script>
