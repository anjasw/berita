<div class="card">
		<h3><center>Form Edit Penulis</center></h3>
		<form method="post" action="">
			<div class="body">
				<div class="form-group">
					<div class="form-line">
						<label for="namapenulis">Nama Penulis</label>
						<input type="text" class="form-control" name="namapenulis" value="<?php echo set_value('namapenulis', $data->row()->namapenulis) ?>"/>
						<?php echo form_error('namapenulis', '<div style="color:red; font-style:italic;">','</div>'); ?>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="form-group">
					<label  for="status">Status</label>
					<select class="form-control" name="status">
						<?
						foreach ($status->result() as $row) {
							if ($row->idstatus == set_value('status', $data->row()->status)) {
								echo "<option value='$row->idstatus' selected>$row->status</option>";

							}else{
								echo "<option value='$row->idstatus'>$row->status</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="input-field">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			</div>
		</form>
</div>
