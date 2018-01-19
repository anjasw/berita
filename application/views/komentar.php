<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h3> <center>Data Komentar User</center></h3>
					<ul class="header-dropdown m-r--5">
						<a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="rotation" data-loading-color="lightBlue">
								<i class="material-icons">loop</i>
						</a>
					</ul>
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
					<?php
						if ($this->session->flashdata('insertstatus') == 'true') {
							echo "<div class='success'> Data Berhasil disimpan</div>";
						}else if ($this->session->flashdata('insertstatus') == 'false') {
							echo "<div class='error'> Gambar tidak ada jadi gagal inputnya..</div>";
						}
						if ($this->session->flashdata('deletestatus') == 'true') {
							echo "<div class='success'> Data Berhasil dihapus</div>";
						}else if ($this->session->flashdata('deletestatus') == 'false') {
							echo "<div class='error'> Data Gagal dihapus</div>";
						}
					?>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover  dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th class="col-lg-1">
									<center>Nama</center>
								</th>
								<th class="col-lg-3">
									<center>Email</center>
								</th>
								<th class="col-lg-3">
									<center>Komentar</center>
								</th>
								<th class="col-lg-2">
									<center>Tanggal komentar</center>
								</th>
								<th class="col-lg-2">
									<center>Fungsi</center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php

									$n = 1;
									foreach ($data->result() as $row ){
										echo"<tr>
											<td><center>$n</center></td>
											<td>$row->nama</center></td>
											<td>$row->email</td>
											<td><center>$row->komen</center></td>
											<td><center>$row->tanggal</center></td>
											<td><center>
											<a onclick='return is_delete()' href='".base_url()."komentar/delete/$row->idkomentar' class='btn red'><i class='material-icons'>delete</i></a>
											</center></td>

											</tr>";
											$n++;
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
	function is_delete() {
		return confirm('Apakah Anda Mau menghapus data ?');
	}
</script>
