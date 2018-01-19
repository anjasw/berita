<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<? echo base_url() ?>front/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="<? echo base_url() ?>front/js/jquery.min.js"></script>
	<link href="<? echo base_url() ?>front/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script type="text/javascript" src="<? echo base_url() ?>front/js/bootstrap.js"></script>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<script src="<? echo base_url() ?>front/js/responsiveslides.min.js"></script>
	<script>
		$(function() {
			$("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>
	<script type="text/javascript" src="<? echo base_url() ?>front/js/move-top.js"></script>
	<script type="text/javascript" src="<? echo base_url() ?>front/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
</head>
<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="top-menu">
					<ul>
						<li><a href="<? echo base_url() ?>">Home</a></li>
						<li><a href="#bawah">Tentang Kami</a></li>
						<li><a href="#bawah">Kontak Kami</a></li>
					</ul>
				</div>
				<div class="num">
					<p> Telepon Kami : 0895 0562 3276</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="logo text-center">
				<a href="<? echo base_url() ?>"><img src="<? echo base_url() ?>front/images/logo.jpg" alt="" /></a>
			</div>
			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
					<div class="wrap">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<?
  				foreach ($berita->result() as $asd) {?>
									<li><a href="<? echo base_url().'news/kategori/'.$asd->idjenisberita.'/'.$asd->jenisberita ?>"><? echo $asd->jenisberita ?></a></li>
									<?}?>
							</ul>
							<div class="search">
								<div class="search-box">
									<div id="sb-search" class="sb-search">
										<form>
											<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
											<input class="sb-search-submit" type="submit" value="">
											<span class="sb-icon-search"> </span>
										</form>
									</div>
								</div>
								<script src="<? echo base_url() ?>front/js/classie.js"></script>
								<script src="<? echo base_url() ?>front/js/uisearch.js"></script>
								<script>
									new UISearch(document.getElementById('sb-search'));
								</script>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
			</div>
			</nav>
		</div>
	</div>
	<div class="wrap">
		<div class="move-text">
			<div class="breaking_news">
				<h2>Breaking News</h2>
			</div>
			<div class="marquee">
				<div class="marquee1"><a class="breaking" href="single.html">>>The standard chunk of Lorem Ipsum used since the 1500s is reproduced..</a></div>
				<div class="marquee2"><a class="breaking" href="single.html">>>At vero eos et accusamus et iusto qui blanditiis praesentium voluptatum deleniti atque..</a></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<script type="text/javascript" src="<? echo base_url() ?>front/js/jquery.marquee.min.js"></script>
			<script>
				$('.marquee').marquee({
					pauseOnHover: true
				});
			</script>
		</div>
	</div>
	<div class="main-body">
		<div class="wrap">
			<ol class="breadcrumb">
				<li><a href="<? echo base_url() ?>">Home</a></li>
				<li class="active">Kategori</li>
			</ol>
			<div class="privacy-page">
				<div class="col-md-8 content-left">
					<div class="fashion">
						<div class="fashion-top">
							<? foreach ($kategori->result() as $k ) {?>
								<div class="col-md-6">
									<a href="<? echo base_url().'news/detail/'.$k->idberita.'/'.$k->seolink?>"><img src="<? echo base_url().'assets/images/'.$k->image ?>" class="img-responsive" alt=""></a>
									<div class="blog-poast-info">
										<p class="fdate"><span class="glyphicon glyphicon-time"></span>On Jun 20, 2015 <a class="span_link1" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link1" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
									</div>
									<h3><a href="<? echo base_url().'news/detail/'.$k->idberita.'/'.$k->seolink?>"><? echo $k->judulberita ?></a></h3>
									<p align="justify">
										<? echo substr(strip_tags($k->isiberita), 0 , 200) ?>
									</p>
									<a class="reu" href="<? echo base_url().'news/detail/'.$k->idberita.'/'.$k->seolink?>"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
								</div>
								<? } ?>
									<div class="clearfix"></div>
						</div>
					</div>
					<div class="photos fashion-photos">
						<header>
							<h3 class="title-head">Gallery</h3>
						</header>
						<div class="course_demo1">
							<ul id="flexiselDemo">
								<? foreach ($semua->result() as $s ) {?>
									<li>
										<img src="<? echo base_url().'assets/images/'.$s->image?>" alt="">
									</li>
									<? } ?>
							</ul>
						</div>
						<link rel="stylesheet" href="<? echo base_url() ?>front/css/flexslider.css" type="text/css" media="screen" />
						<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint: 480,
											visibleItems: 2
										},
										landscape: {
											changePoint: 640,
											visibleItems: 2
										},
										tablet: {
											changePoint: 768,
											visibleItems: 3
										}
									}
								});
							});
						</script>
						<script type="text/javascript" src="<? echo base_url() ?>front/js/jquery.flexisel.js"></script>
						<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint: 480,
											visibleItems: 2
										},
										landscape: {
											changePoint: 640,
											visibleItems: 2
										},
										tablet: {
											changePoint: 768,
											visibleItems: 3
										}
									}
								});
							});
						</script>
					</div>
					<div class="life-style">
						<header>
							<h3 class="title-head">Life Style</h3>
						</header>
						<div class="life-style-grids">
							<div class="life-style-left-grid">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/l1.jpg" alt="" /></a>
								<a class="title" href="single.html">It is a long established fact that a reader will be distracted.</a>
							</div>
							<div class="life-style-right-grid">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/l2.jpg" alt="" /></a>
								<a class="title" href="single.html">There are many variations of passages of Lorem Ipsum available.</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="life-style-grids">
							<div class="life-style-left-grid">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/l3.jpg" alt="" /></a>
								<a class="title" href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
							</div>
							<div class="life-style-right-grid">
								<a href="single.html"><img src="<? echo base_url() ?>front/<? echo base_url() ?>front/images/l4.jpg" alt="" /></a>
								<a class="title" href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="sports-top">
						<div class="s-grid-left">
							<div class="cricket">
								<header>
									<h3 class="title-head">Business</h3>
								</header>
								<div class="c-sports-main">
									<div class="c-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/bus1.jpg" alt="" /></a>
									</div>
									<div class="c-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Feb 25, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/bus2.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Mar 21, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/bus3.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Jan 25, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/bus4.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Jul 19, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="s-grid-right">
							<div class="cricket">
								<header>
									<h3 class="title-popular">Technology</h3>
								</header>
								<div class="c-sports-main">
									<div class="c-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/tec1.jpg" alt="" /></a>
									</div>
									<div class="c-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Apr 22, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/tec2.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Jan 19, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/tec3.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Jun 25, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="s-grid-small">
									<div class="sc-image">
										<a href="single.html"><img src="<? echo base_url() ?>front/images/tec4.jpg" alt="" /></a>
									</div>
									<div class="sc-text">
										<h6>Lorem Ipsum</h6>
										<a class="power" href="single.html">It is a long established fact that a reader</a>
										<p class="date">On Jul 19, 2015</p>
										<a class="reu" href="single.html"><img src="<? echo base_url() ?>front/images/more.png" alt="" /></a>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-4 side-bar">
					<div class="first_half">
						<div class="categories">
							<header>
								<h3 class="side-title-head">Categories</h3>
							</header>
							<ul>
								<?
									foreach ($berita->result() as $asd) {?>
									<li><a href="<? echo base_url().'news/kategori/'.$asd->idjenisberita.'/'.$asd->jenisberita ?>"><? echo $asd->jenisberita ?></a></li>
									<?}?>
							</ul>
						</div>
						<div class="newsletter">
							<h1 class="side-title-head">Newsletter</h1>
							<p class="sign">Sign up to receive our free newsletters!</p>
							<form>
								<input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
								<input type="submit" value="submit">
							</form>
						</div>
						<div class="list_vertical">
							<section class="accordation_menu">
								<div>
									<input id="label-1" name="lida" type="radio" checked/>
									<label for="label-1" id="item1"><i class="ferme"> </i>Popular Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
									<div class="content" id="a1">
										<div class="scrollbar" id="style-2">
											<div class="force-overflow">
												<div class="popular-post-grids">
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/bus2.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html"> The section of the mass media industry</a>
															<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/bus1.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>
															<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/bus3.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html">There are many variations of Lorem</a>
															<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/bus4.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>
															<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div>
									<input id="label-2" name="lida" type="radio" />
									<label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Recent Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
									<div class="content" id="a2">
										<div class="scrollbar" id="style-2">
											<div class="force-overflow">
												<div class="popular-post-grids">
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/tec2.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html"> The section of the mass media industry</a>
															<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/tec1.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>
															<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/tec3.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html">There are many variations of Lorem</a>
															<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="popular-post-grid">
														<div class="post-img">
															<a href="single.html"><img src="<? echo base_url() ?>front/images/tec4.jpg" alt="" /></a>
														</div>
														<div class="post-text">
															<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>
															<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div>
									<input id="label-3" name="lida" type="radio" />
									<label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Comments<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
									<div class="content" id="a3">
										<div class="scrollbar" id="style-2">
											<div class="force-overflow">
												<div class="response">
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>MARCH 21, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>MARCH 26, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>MAY 25, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>FEB 13, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>JAN 28, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>APR 18, 2015</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="media response-info">
														<div class="media-left response-text-left">
															<a href="#">
																<img class="media-object" src="<? echo base_url() ?>front/images/icon1.png" alt="" />
															</a>
															<h5><a href="#">Username</a></h5>
														</div>
														<div class="media-body response-text-right">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<ul>
																<li>DEC 25, 2014</li>
																<li><a href="single.html">Reply</a></li>
															</ul>
														</div>
														<div class="clearfix"> </div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="side-bar-articles">
							<div class="side-bar-article">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/sai.jpg" alt="" /></a>
								<div class="side-bar-article-title">
									<a href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text</a>
								</div>
							</div>
							<div class="side-bar-article">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/sai2.jpg" alt="" /></a>
								<div class="side-bar-article-title">
									<a href="single.html">There are many variations of passages of Lorem</a>
								</div>
							</div>
							<div class="side-bar-article">
								<a href="single.html"><img src="<? echo base_url() ?>front/images/sai3.jpg" alt="" /></a>
								<div class="side-bar-article-title">
									<a href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a>
								</div>
							</div>
						</div>
					</div>
					<div class="secound_half">
						<div class="popular-news">
							<header>
								<h3 class="title-popular">popular News</h3>
							</header>
							<div class="popular-grids">
								<div class="popular-grid">
									<a href="single.html"><img src="<? echo base_url() ?>front/images/popular-4.jpg" alt="" /></a>
									<a class="title" href="single.html">It is a long established fact that a reader will be distracted</a>
									<p>On Aug 31, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
								</div>
								<div class="popular-grid">
									<iframe width="100%" src="https://www.youtube.com/embed/LGMn_yi_62k" frameborder="0" allowfullscreen></iframe>
									<a class="title" href="single.html">Aishwarya Rai Bachchan's Latest SHOCKING News For Ex Salman Khan</a>
									<p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
								</div>
								<div class="popular-grid">
									<a href="single.html"><img src="<? echo base_url() ?>front/images/popular-3.jpg" alt="" /></a>
									<a class="title" href="single.html">It is a long established fact that a reader will be distracted</a>
									<p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="footer" id="bawah">
		<div class="footer-top">
			<div class="wrap">
				<div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
					<h4 class="footer-head">About Us</h4>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">Categories</h4>
					<ul class="cat">
						<?
						foreach ($berita->result() as $asd) {?>
							<li><a href="<? echo base_url().'news/kategori/'.$asd->idjenisberita.'/'.$asd->jenisberita ?>"><? echo $asd->jenisberita ?></a></li><?}?>
					</ul>
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">Flickr Feed</h4>
					<ul class="flickr">
						<li><a href="#"><img src="<? echo base_url() ?>front/images/bus4.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/bus2.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/bus3.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/tec4.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/tec2.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/tec3.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/bus2.jpg"></a></li>
						<li><a href="#"><img src="<? echo base_url() ?>front/images/bus3.jpg"></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">Contact Us</h4>
					<span class="hq">Our headquaters</span>
					<address>
						<ul class="location">
							<li><span class="glyphicon glyphicon-map-marker"></span></li>
							<li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
							<div class="clearfix"></div>
						</ul>
						<ul class="location">
							<li><span class="glyphicon glyphicon-earphone"></span></li>
							<li>+62 895 0562 3276</li>
							<div class="clearfix"></div>
						</ul>
						<ul class="location">
							<li><span class="glyphicon glyphicon-envelope"></span></li>
							<li><a href="mailto:anjaswicaksana122@gmail.com">anjaswicaksana122@gmail.com</a></li>
							<div class="clearfix"></div>
						</ul>
					</address>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copyrights col-md-6">
					<p> © 2017 Anjas Wicaksana.</p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a class="facebook" href="#"></a></li>
						<li><a class="twitter" href="#"></a></li>
						<li><a class="flickr" href="#"></a></li>
						<li><a class="googleplus" href="#"></a></li>
						<li><a class="dribbble" href="#"></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
