<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>EbonyJet Media</title>
	<link rel="stylesheet" href="css/style_register.css">
</head>
<body>
<div class="header">
	<h2>EBONYJET MEDIA</h2>
</div>
<form method="post" action="register.php">
<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="index.php">Sign in</a>
	</p>
</form>
<p style="margin-left: 43%;margin-top:10px;font-size:18px;"><b>&copy; 2019 EbonyJet Media</b></p>
</body>
</html>