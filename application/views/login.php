<html>
	<head>
		<script src='<?= base_url(); ?>application/js/jquery.js' type='text/javascript'></script>	
		<link rel='stylesheet' href='<?= base_url(); ?>application/css/bootstrap.413.css' type='text/css'>
		<link rel='stylesheet' href='<?= base_url(); ?>application/css/bootstrap.337.css' type='text/css'>
		<link rel='stylesheet' href='<?= base_url(); ?>application/css/login.css' type='text/css'>
	</head>
	<body>
		<div class='container'>
			<div class='col-lg-6 col-md-6 col-sm-8 col-xs-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-1 login_box'>
				<form action='<?= site_url('Welcome/log_in') ?>' method='POST'>
					<h2 style='font-family:bebasneue'>Log in</h2>
					<label>Username</label>
					<input type='text'		class='form_alpha' 	name='username'>
					<label>Password</label>
					<input type='password' 	class='form_alpha' 	name='password'>
					<br>
					<div style='text-align:center'>
						<button type='submit' class='btn_alpha_login'>Log in</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>