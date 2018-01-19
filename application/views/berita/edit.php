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
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
	<div class="header">
		<h3><center>Form Edit Berita</center></h3>
	</div>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="body">
			<div class="form-group">
				<div class="form-line">
					<label for="judulberita">Judul Berita</label>
					<input class="form-control" type="text" name="judulberita" value="<?php echo set_value('judulberita', $data->row()->judulberita) ?>"/>
					<?php echo form_error('judulberita', '<div style="color:red; font-style:italic;">','</div>'); ?>
				</div>
				</div>
		</div>
		<div class="body">
				<div class="form-group">
					<label for="idjenisberita">Kategori</label>
					<select class="form-control" name="idjenisberita">
						<?
						foreach ($jenisberita->result() as $row) {
							if ($row->idjenisberita == set_value('jeniserita', $data->row()->jenisberita)) {
								echo "<option value='$row->idjenisberita'>$row->jenisberita</option>";
							}else{
								echo "<option value='$row->idjenisberita'>$row->jenisberita</option>";
							}
						}
						?>
					</select>
				</div>
		</div>
		<div class="body">
			<div class="form-group">
				<label for="penulis" class="form-label">Penulis</label>
				<select class="form-control" name="idpenulis">
					<?
					foreach ($penulis->result() as $row) {
						if ($row->idpenulis == set_value('penulis', $data->row()->namapenulis)) {
							echo "<option value='$row->idpenulis' selected>$row->namapenulis</option>";
						}else{
							echo "<option value='$row->idpenulis'>$row->namapenulis</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	  <div class="body">
			<div class="col-sm-12">
		    <div class="form-group">
		      <div class="form-line">
						<label for="isiberita" class="">Konten Berita</label>
		        <textarea name="isiberita" rows="4" id="ckeditor" placeholder="Konten Berita.."><?php echo set_value('isiberita', $data->row()->isiberita) ?></textarea>
		      </div>
					<?php echo form_error('isiberita', '<div style="color:red; font-style:italic;">','</div>'); ?>
		    </div>
		  </div>
	  </div>
		<div class="body">
			<div class="form-group">
				<label for="status" class="form-label">Status</label>
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
		<div class="body">
			<div class="form-group">
				<input type="file" name="images" value="<?php echo set_value('images', $data->row()->image) ?>">
			</div>
		</div>
		<div class="row clearfix">
			<div class="form-group">
				<center>
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
					<a href="<? echo base_url()?>berita" class="btn bg-red waves-effect">Batal</a>

				</center>
			</div>
		</div>
	</form>
</div>
</div>
</div>
