<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Admin Berita</title>
	<link rel="stylesheet" href="<? echo base_url()?>assets/icon2.css">
	<link rel="icon" href="<? echo base_url() ?>favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="<? echo base_url() ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<? echo base_url() ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
	<link href="<? echo base_url() ?>plugins/node-waves/waves.css" rel="stylesheet" />
	<link href="<? echo base_url() ?>plugins/animate-css/animate.css" rel="stylesheet" />
	<link href="<? echo base_url() ?>plugins/waitme/waitMe.css" rel="stylesheet" />
	<link href="<? echo base_url() ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<? echo base_url() ?>css/style.css" rel="stylesheet">
	<link href="<? echo base_url() ?>css/themes/all-themes.css" rel="stylesheet" />
	<link href="<? echo base_url()?>assets/css/style.css">
	<link href="<? echo base_url() ?>plugins/morrisjs/morris.css" rel="stylesheet" />
</head>
<body class="theme-blue">
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<div class="overlay"></div>
	<div class="search-bar">
		<div class="search-icon">
			<i class="material-icons">search</i>
		</div>
		<input type="text" placeholder="START TYPING...">
		<div class="close-search">
			<i class="material-icons">close</i>
		</div>
	</div>
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="<? echo base_url()?>dashboard">Welcome <?php echo $user['name'] ?></a>
			</div>
		</div>
	</nav>
	<section>
		<aside id="leftsidebar" class="sidebar">
			<div class="user-info">
				<div class="image">
					<img src="<? echo base_url() ?>images/user.png" width="48" height="48" alt="User" />
				</div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $user['name'] ?>
					</div>
					<div class="email">
						<?php echo $user['email'] ?>
					</div>
					<div class="btn-group user-helper-dropdown">
						<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
						<ul class="dropdown-menu pull-right">
							<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
							<li role="seperator" class="divider"></li>
							<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
							<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
							<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
							<li role="seperator" class="divider"></li>
							<li><a href="<?echo base_url() ?>login/logout"><i class="material-icons">input</i>Sign Out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="menu">
				<ul class="list">
					<li class="active">
						<a href="<? echo base_url() ?>dashboard">
              <i class="material-icons">home</i>
              <span>Home</span>
            </a>
					</li>
					<li class="active">
						<a href="<? echo base_url() ?>Kategori">
              <i class="material-icons">list</i>
              <span>Kategori</span>
            </a>
					</li>
					<li class="active">
						<a href="<? echo base_url() ?>berita">
              <i class="material-icons">chrome_reader_mode</i>
              <span>Berita</span>
            </a>
					</li>
					<li class="active">
						<a href="<? echo base_url() ?>penulis">
              <i class="material-icons">contacts</i>
              <span>Penulis</span>
            </a>
					</li>
					<li class="active">
						<a href="<? echo base_url() ?>komentar">
              <i class="material-icons">message</i>
              <span>Komentar</span>
            </a>
					</li>
					<li class="active">
						<a href="<? echo base_url()?>slider">
              <i class="material-icons">perm_media</i>
              <span>Slider</span>
            </a>
					</li>
				</ul>
			</div>
			<div class="legal">
				<div class="copyright">
					&copy; Oktober <a href="javascript:void(0);">Anjas Wicaksana</a>.
				</div>
				<div class="version">
					<b>Karya: </b> 5
				</div>
			</div>
		</aside>

	</section>
	<section class="content">
		<?php $this->load->view($view)?>
	</section>
	<script src="<? echo base_url() ?>plugins/jquery/jquery.min.js"></script>
	<script src="<? echo base_url() ?>plugins/bootstrap/js/bootstrap.js"></script>
	<script src="<? echo base_url() ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
	<script src="<? echo base_url() ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="<? echo base_url() ?>plugins/node-waves/waves.js"></script>
	<script src="<? echo base_url() ?>plugins/waitme/waitMe.js"></script>
	<script src="<? echo base_url() ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="<? echo base_url() ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<? echo base_url() ?>plugins/ckeditor/ckeditor.js"></script>
	<script src="<? echo base_url() ?>js/admin.js"></script>
	<script src="<? echo base_url() ?>js/pages/tables/jquery-datatable.js"></script>
	<script src="<? echo base_url() ?>js/pages/cards/colored.js"></script>
	<script src="<? echo base_url() ?>js/pages/forms/editors.js"></script>
	<script src="<? echo base_url() ?>plugins/jquery-countto/jquery.countTo.js"></script>
	<script src="<? echo base_url() ?>plugins/raphael/raphael.min.js"></script>
	<script src="<? echo base_url() ?>plugins/morrisjs/morris.js"></script>
	<script src="<? echo base_url() ?>plugins/chartjs/Chart.bundle.js"></script>
	<script src="<? echo base_url() ?>plugins/flot-charts/jquery.flot.js"></script>
	<script src="<? echo base_url() ?>plugins/flot-charts/jquery.flot.resize.js"></script>
	<script src="<? echo base_url() ?>plugins/flot-charts/jquery.flot.pie.js"></script>
	<script src="<? echo base_url() ?>plugins/flot-charts/jquery.flot.categories.js"></script>
	<script src="<? echo base_url() ?>plugins/flot-charts/jquery.flot.time.js"></script>
	<script src="<? echo base_url() ?>plugins/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="<? echo base_url() ?>js/pages/index.js"></script>
	<script src="<? echo base_url() ?>js/demo.js"></script>
</body>
</html>
