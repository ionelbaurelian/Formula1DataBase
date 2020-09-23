<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username*</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password*</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password*</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label>Last Name*</label>
			<input type="text" name="Nume" value="<?php echo $Nume; ?>">
		</div>
		<div class="input-group">
			<label>First Name*</label>
			<input type="text" name="Prenume" value="<?php echo $Prenume; ?>">
		</div>
		<div class="input-group">
			<label>Email*</label>
			<input type="email" name="Email" value="<?php echo $Email; ?>">
		</div>
		<div class="input-group">
			<label>Sex*</label>
			<select name="Sex">
			<option value="F">F</option>
			<option value="M">M</option>
			</select>
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="Telefon" value="<?php echo $Telefon; ?>">
		</div>
		<div class="input-group">
			<label>Country</label>
			<input type="text" name="Tara" value="<?php echo $Tara; ?>">
		</div>
		<div class="input-group">
			<label>City</label>
			<input type="text" name="Oras" value="<?php echo $Oras; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>