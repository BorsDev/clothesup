<?php

	if (isset($_POST["submit"])) {
		
		$Fname = $_POST["Fname"];
		$Lname = $_POST["Lname"];
		$email = $_POST["email"];
		$pNumber = $_POST['Pnumber'];
		$pwd = $_POST["pwd"];
		$pwdrepeat = $_POST["pwdrepeat"];
		$current_date = date("Y-m-d H:i:s");

		require_once '../db/db.config.php';
		require_once 'function.inc.php';


		if (emptyInputSignup($Fname, $Lname, $email, $pwd, $pwdrepeat, $pNumber) !== false) {
			header("location: ../signup.php?error=emptyinput");
			exit();
		}
		if (invalidUsername($Fname, $Lname) !== false) {
			header("location: ../signup.php?error=invalidUsername");
			exit();
		}
		if (invalidEmail($email) !==false) {
			header("location: ../signup.php?error=invalidEmail");
			exit();
		}
		if (nmach($pwd, $pwdrepeat) !== false) {
			header("location: ../signup.php?error=pwdunmatch");
			exit();
		}
		if (uidexist($conn, $Fname, $Lname) !== false) {
			header("location: ../signup.php?error=usernameTaken");
			exit();
		}
		if (emailexist($conn, $email) !== false) {
			header("location: ../signup.php?error=EmailTaken");
			exit();
		}

		createUser($conn, $Fname, $Lname, $email, $pNumber, $pwd, $current_date);
	}
	else {
		header("location: ../signup.php");
		exit();
	}