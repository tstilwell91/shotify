<?php
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Shotify!</title>
</head>
<body>
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. GeorgeWashington" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" type="password" name="loginPassword" required>
			</p>
			<button type="submit" name="loginButton">LOG IN</button>
		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<label for="Username">Username</label>
				<input id="Username" type="text" name="Username" placeholder="e.g. GeorgeWashington" required>
			</p>
			<p>
				<label for="firstName">First name</label>
				<input id="firstName" type="text" name="firstName" placeholder="e.g. George" required>
			</p>
			<p>
				<label for="lastName">Last name</label>
				<input id="lastName" type="text" name="lastName" placeholder="e.g. Washington" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input id="email" type="text" name="email" placeholder="George@gmail.com" required>
			</p>
			<p>
				<label for="confirmEmail">Username</label>
				<input id="confirmEmail" type="email" name="confirmEmail" placeholder="e.g. George@gmail.com" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" type="password" name="password" placeholder="Your password" required>
			</p>
			<p>
				<label for="confirmPassword">Confirm password</label>
				<input id="confirmPassword" type="password" name="confirmPassword" placeholder="Your password" required>
			</p>
			<button type="submit" name="registerButton">SIGN UP</button>
		</form>
	</div>
</body>
</html>