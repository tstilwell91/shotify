<?php 
	class Account {

		private $errorArray;
		private $con;
		
		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array(); 
		}

		public function login ($username, $password) {
			$password = md5($password);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}

		public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
			$this->validateUsername($username);
	  		$this->validateFirstName($firstName);
	  		$this->validateLastName($lastName);
	  		$this->validateEmails($email, $confirmEmail);
	  		$this->validatePasswords($password, $confirmPassword);

	  		if (empty($this->errorArray)) {
	  			return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
	  		}

	  		else {
	  			return false;
	  		}
		}

		public function getError($error) {
			if (!in_array($error, $this->errorArray)) {
				$error = "";
			}

			return "<span class='errorMessage'>$error</span>";

		}

		private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
			$encryptedPw = md5($password);
			$profilePic = "assets/images/profile-pics/profile.jpeg";
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')");

			return $result;
		}

		private function validateUsername($validate_username) {
			
			if(strlen($validate_username) > 25 || strlen($validate_username) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$validate_username'");
			
			if(mysqli_num_rows($checkUsernameQuery) != 0 ) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}
			
		}

		private function validateFirstName($validate_FirstName) {
			
			if(strlen($validate_FirstName) > 25 || strlen($validate_FirstName) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($validate_LastName) {
			
			if(strlen($validate_LastName) > 25 || strlen($validate_LastName) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($validate_email, $validate_confirmEmail) {
			if ($validate_email != $validate_confirmEmail) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}

			if (!filter_var($validate_email, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$validate_email'");
				if(mysqli_num_rows($checkEmailQuery) != 0 ) {
					array_push($this->errorArray, Constants::$emailTaken);
					return;
			} 
		}

		private function validatePasswords($validate_password, $validate_confirmPassword) {
			
			if ($validate_password != $validate_confirmPassword) {
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}

			if (preg_match('/[^A-Za-z0-9]/', $validate_password)) {
				array_push($this->errorArray, Constants::$passwordsNotAlphanumeric);
				return;
			}
			
			if(strlen($validate_password) > 30 || strlen($validate_password) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}

	}
?>