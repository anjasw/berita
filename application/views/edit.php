<h3><center>Form Edit Penulis</center></h3>
<form method="post" action="">
	<div class="input-field">
		<input type="text" name="namapenulis" value="<?php echo set_value('namapenulis', $data->row()->namapenulis) ?>"/>
		<label for="namapenulis">Nama Penulis</label>
		<?php echo form_error('namapenulis', '<div class="error">','</div>'); ?>
		</div>
	<div class="input-field">
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
		<label for="status">Status</label>
	</div>
	<div class="input-field">
		<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
	</div>
</form>
