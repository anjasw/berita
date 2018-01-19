<div class="card">
	<div class="body">
		<h3><center>Form Tambah Data Kategori</center></h3>
		<form method="post" action="">

				<div class="col-sm-12">
						<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label" for="namapenulis">Nama Penulis</label>
										<input type="text" class="form-control" name="namapenulis">
										<?php echo form_error('namapenulis', '<div style="color:red; font-style:italic;">','</div>'); ?>
								</div>
						</div>
				</div>
			<div class="input-field">
				<label for="status">Status</label>
				<select class="form-control" name="status">
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
			<br>
			<div class="input-field">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			</div>
		</form><br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
