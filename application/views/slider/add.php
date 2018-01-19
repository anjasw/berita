
<div class="card"><br>
	<h3><center>Form Tambah Berita</center></h3>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="col-sm-12">
				<div class="form-group form-float">
						<div class="form-line">
							<label class="form-label" for="judul">Judul Slider</label>
								<input type="text" class="form-control" name="judul">
								<?php echo form_error('judul', '<div style="color:red; font-style:italic;">','</div>'); ?>
						</div>
				</div>
		</div>
		<div class="body">
				<div class="row clearfix">
						<div class="col-sm-12">
							<label for="status" class="form-label">Status</label>
								<select class="form-control show-tick" name="status">
									<option value="0">Tidak Aktif</option>
									<option value="1">Aktif</option>
								</select>
						</div>
				</div>
		</div>
	<div class="body">
			<input type="file" name="images">
				<?php
				if ($this->session->flashdata('insertstatus') == 'false') {
					echo "<p style='color : red; font-style:italic;'>Gambarnya Kosong</p>";
				}
				?><br>
			<button type="submit" class="btn bg-cyan waves-effect">Simpan</button>
			<a href="<? echo base_url()?>slider" class="btn bg-red waves-effect">Batal</a>
		</div>
	</form><br><br><br><br><br><br>
</div>
