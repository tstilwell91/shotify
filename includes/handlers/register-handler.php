<?php

	function sanitizeFormUserName($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}

	function sanitizeFormString($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		$inputText = ucfirst(strtolower($inputText));
		return $inputText;
	}

	function sanitizeFormPassword($inputText) {
		$inputText = strip_tags($inputText);
		return $inputText;
	}

	function validateUsername($validate_username) {

	}

	function validateFirstName($validate_FirstName) {

	}

	function validateLastName($validate_LastName) {

	}

	function validateEmails($validate_email, $validate_confirmEmail) {

	}

	function validatePasswords($validate_password, $validate_confirmPassword) {

	}

 	if(isset($_POST['registerButton'])) {
 		//Register button was pressed
 		$username = sanitizeFormUserName($_POST['Username']);
  		$firstName = sanitizeFormString($_POST['firstName']);
  		$lastName = sanitizeFormString($_POST['lastName']);
  		$email = sanitizeFormString($_POST['email']);
  		$confirmEmail = sanitizeFormString($_POST['confirmEmail']);
  		$password = sanitizeFormPassword($_POST['password']);
  		$confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);	 

  		validateUsername($username);
  		validateFirstName($firstName);
  		validateLastName($lastName);
  		validateEmails($email, $confirmEmail);
  		validatePasswords($password, $confirmPassword);
  		
  	}
?>