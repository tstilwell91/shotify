<?php
	include("includes/config.php");

	session_destroy();

	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}
	else {
		header("Location: register.php");
	}
?>

<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>

<p>My first paragraph..!!</p>

</body>
</html>
