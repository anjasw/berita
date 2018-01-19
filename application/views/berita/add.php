
<div class="card"><br>
	<h3><center>Form Tambah Berita</center></h3>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="col-sm-12">
				<div class="form-group form-float">
						<div class="form-line">
							<label class="form-label" for="judulberita">Judul Berita</label>
								<input type="text" class="form-control" name="judulberita">
								<?php echo form_error('judulberita', '<div style="color:red;font-style:italic;">','</div>'); ?>
						</div>
				</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group form-float">
					<div class="form-line">
							<textarea  name="isiberita" rows="4" id="ckeditor" placeholder="Konten Berita"></textarea>
							<?php echo form_error('isiberita', '<div style="color:red;font-style:italic;">','</div>'); ?>
					</div>
			</div>
		</div>
		<div class="body">
				<div class="row clearfix">
						<div class="col-sm-12">
							<label for="idjenisberita">Kategori</label>
								<select class="form-control show-tick" name="idjenisberita">
									<?
									foreach ($jenisberita->result() as $row) {
										if ($row->idjenisberita == set_value('idjenisberita', 0)) {
											echo "<option value='$row->idjenisberita' selected>$row->jenisberita</option>";
										}else{
											echo "<option value='$row->idjenisberita'>$row->jenisberita</option>";
											}
										}
									?>
								</select>
						</div>
				</div>
		</div>
		<div class="body">
				<div class="row clearfix">
						<div class="col-sm-12">
							<label for="status">Status</label>
								<select class="form-control show-tick" name="status">
									<?
									foreach ($status->result() as $row) {
										if ($row->idstatus == set_value('status', 1)) {
											echo "<option value='$row->idstatus' selected>$row->status</option>";
										}else{
											echo "<option value='$row->idstatus'>$row->status</option>";
											}
										}
									?>
								</select>
						</div>
				</div>
		</div>
	<div class="body">
		<div class="row clearfix">
				<div class="col-sm-12">
					<label for="idpenulis" class="form-label">Penulis</label>
						<select class="form-control show-tick" name="idpenulis">
						<?
							foreach ($penulis	->result() as $row) {
								if ($row->idpenulis == set_value('idpenulis', 0)) {
									echo "<option value='$row->idpenulis' selected>$row->namapenulis</option>";
								}else{
									echo "<option value='$row->idpenulis'>$row->namapenulis</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			<input type="file" name="images">
			<?php
			if ($this->session->flashdata('insertstatus') == 'false') {
				echo "<p style='color:red;font-style:italic;'>Gambarnya harus ada</p>";
			}
			?>
				<br>
			<button type="submit" class="btn bg-cyan waves-effect">Simpan</button>
			<a href="<? echo base_url()?>berita" class="btn bg-red waves-effect">Batal</a>
		</div>
	</form>
</div>
