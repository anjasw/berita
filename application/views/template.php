<!DOCTYPE html>
<html>
<head>
	<title>Dashboar Panel</title>
	<link href="<?php echo base_url() ?>assets/icon2.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" href="<? echo base_url()?>assets/css/style.css">
</head>
<body>

<nav class="blue">

		<div class="nav-wrapper">
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li class="nav-item active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>dashboard">Beranda</a>
				</li>
				<li class="active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>index.php/kategori">Kategori</a>
				</li>
				<li class="active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>berita">Berita</a>
				</li>
				<li class="active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>komentar">Komentar</a>
				</li>
				<li class="active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>penulis">Penulis</a>
				</li>
				<li class="active">
					<a style="color:white;" class="nav-link" href="<?php echo base_url()?>slider">Slider</a>
				</li>
				<li class="active"><a href="<?php echo base_url('login/logout')?>">Log out</a></li>
			</ul>

			<ul class="side-nav" id="mobile-demo">
				<li>
					<a href="<?php echo base_url()?>dashboard">Beranda</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>kategori">Kategori</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>berita">Berita</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>komentar">Komentar</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>penulis">Penulis</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>slider">Slider</a>
				</li>
				<li class="active"><a href="<?php echo base_url('login/logout')?>">Log out</a></li>
			</ul>
			<a href="#" class="brand-logo">Welcome Admin</a>
		</div>


</nav>
<div class="container">
	 <div class="row">
	 	<div class="col s12">
	<?php $this->load->view($view)?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".button-collapse").sideNav();
		$('select').material_select();
	});
</script>
</body>
</html>
