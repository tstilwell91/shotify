<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	
	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	//getvalue function to remember values in boxes
	function getInputValue($input) {
		if(isset($_POST[$input])) {
			echo $_POST[$input];
		}
	}
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
				<?php echo $account->getError(Constants::$loginFailed); ?>
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
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
				<label for="Username">Username</label>
				<input id="Username" type="text" name="Username" placeholder="e.g. GeorgeWashington" value="<?php getInputValue('Username') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<label for="firstName">First name</label>
				<input id="firstName" type="text" name="firstName" placeholder="e.g. George" value="<?php getInputValue('firstName') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<label for="lastName">Last name</label>
				<input id="lastName" type="text" name="lastName" placeholder="e.g. Washington" value="<?php getInputValue('lastName') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<?php echo $account->getError(Constants::$emailTaken); ?>
				<label for="email">Email</label>
				<input id="email" type="text" name="email" placeholder="George@gmail.com" value="<?php getInputValue('email') ?>" required>
			</p>
			<p>
				<label for="confirmEmail">Confirm Email</label>
				<input id="confirmEmail" type="email" name="confirmEmail" placeholder="e.g. George@gmail.com" value="<?php getInputValue('confirmEmail') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
				<?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
				<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
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