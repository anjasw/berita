<!DOCTYPE html>
<html>
<head>
	<title>Login Panel</title>
	<link href="<?php echo base_url() ?>assets/icon2.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css" media="screen,projection" />
</head>
<body>
<br><br><br><br><br>
<div class="container">
	<h3><center>Form Login</center></h3>
	<div class="row">

	 <div class="col s3">
	 </div>
	 <div class="col s6">
	 <table border="1">
	<form method="post" action="">
	<div class="input-field">
		<?php echo $msg; ?>
	</div>
		<div class="input-field">

		<input type="text" name="username" value="<?php echo set_value('username'); ?>"	><br>
		<label for="username">Username</label>
		<?php echo form_error('username', '<div class="error">','</div>'); ?>
		</div>
		<div class="input-field">

		<input type="password" name="password"><br>
		<label for="password">Password</label>
		<?php echo form_error('password', '<div class="error">','</div>'); ?>
		</div>
		<div class="input-field">
			<button type="submit" class="btn blue" name="login" value="login">Login</button>
		</div>
	</form>
	</table>
	</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
</body>
</html>
