<div class="card">
	<h3><center>Form Edit Data Kategori</center></h3>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="col-sm-12">
				<div class="form-group form-float">
						<div class="form-line">
							<label class="form-label" for="jenisberita">Kategori	</label>
								<input type="text" class="form-control" name="jenisberita" value="<?php echo set_value('jenisberita', $data->row()->jenisberita) ?>">
								<?php echo form_error('jenisberita', '<div style="color:red; font-style:italic;">','</div>'); ?>
						</div>
				</div>
		</div>
		<div class="body">
				<div class="row clearfix">
						<div class="col-sm-12">
							<label for="status" class="form-label">Status</label>
								<select class="form-control show-tick" name="status">
									<option value="0" <?php echo $data->row()->status == 0 ?  'selected' : ''?>>Tidak Aktif</option>
									<option value="1" <?php echo $data->row()->status == 1 ?  'selected' : ''?>>Aktif</option>
								</select>
						</div>
				</div><br>
				<button type="submit" class="btn btn-lg bg-cyan waves-effect">Simpan</button><br><br>
		</div>
	</form><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
