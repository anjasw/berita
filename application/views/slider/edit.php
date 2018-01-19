<?php
if ($this->session->flashdata('insertstatus') == 'true') {
	echo "<div class='success'> Data Berhasil disimpan</div>";
}else if ($this->session->flashdata('insertstatus') == 'false') {
	echo "<script>alert('Images Harus Ada..')</script>";
}
if ($this->session->flashdata('deletestatus') == 'true') {
	echo "<div class='success'> Data Berhasil dihapus</div>";
}else if ($this->session->flashdata('deletestatus') == 'false') {
	echo "<div class='error'> Data Gagal dihapus</div>";
}
?>
<div class="card"><br>
	<h3><center>Form Tambah Slider</center></h3>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="col-sm-12">
				<div class="form-group form-float">
						<div class="form-line">
							<label class="form-label" for="judul">Judul Slider</label>
								<input type="text" class="form-control" name="judul" value="<?php echo set_value('judul', $data->row()->judul) ?>">
								<?php echo form_error('Judul', '<div style="color:red; font-style:italic;">','</div>'); ?>
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
				</div>
		</div>
	<div class="body">
			<input type="file" name="images" value="<?php echo set_value('image', $data->row()->image) ?>">
				<br>
			<button type="submit" class="btn bg-cyan waves-effect">Simpan</button>
			<a href="<? echo base_url()?>slider" class="btn bg-red waves-effect">Batal</a>
		</div>
	</form><br><br><br><br><br><br>
</div>
