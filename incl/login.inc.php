<?php

	if (isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		require_once '../db/db.config.php';
		require_once 'function.inc.php';

		if (emptyInputLogin($email, $password) !== false) {
		header("location: ../login.php?error=emptyinput");
		exit();
		}
		loginUser($conn, $email, $password);
	}
	else{
		header("location: ../login.php");
		exit();
	}