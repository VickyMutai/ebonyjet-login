<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>EBONYJET MEDIA</title>
	<link rel="stylesheet" type="text/css" href="css/style_register.css">
</head>
<body>
	<div class="header">
		<h2>EBONYJET LOGIN</h2>
	</div>
	<form method="post" action="index.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<p style="margin-left: 43%;margin-top:10px;font-size:18px;"><b>&copy; 2019 EbonyJet Media</b></p>
	</body>
</html>