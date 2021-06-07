<?php

	function emptyInputSignup($Fname, $Lname, $email, $pwd, $pwdrepeat, $pNumber){
		$result;
		if (empty($Fname) || empty($Lname) || empty($email) || empty($pwd) || empty($pwdrepeat) || empty($pNumber)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidUsername($Fname, $Lname){
		$result;
		if (!preg_match("/^[a-zA-z0-9]*$/", $Fname || $Lname)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidEmail($email){
		$result;
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function nmach($pwd, $pwdrepeat){
		$result;
		if ($pwd !== $pwdrepeat) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function uidexist($conn, $Fname, $Lname){
		$sql = "SELECT * FROM user WHERE U_FNAME = ? AND U_LNAME = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmterror");
			exit();
		}

		mysqli_stmt_bind_param($stmt,"ss",  $Fname, $Lname);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else{
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}
	function emailexist($conn, $email){
		$sql = "SELECT * FROM user WHERE U_EMAIL=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmterror");
			exit();
		}

		mysqli_stmt_bind_param($stmt,"s",$email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else{
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}
	function createUser($conn, $Fname, $Lname, $email, $pNumber, $pwd, $current_date){
		$sql = "INSERT INTO `user` (`U_FNAME`, `U_LNAME`, `U_EMAIL`, `U_PNUM`, `U_PASS`, `U_CREATE_TIME`) VALUES (?, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmterror");
			exit();
		}

		$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt,"ssssss", $Fname, $Lname, $email, $pNumber, $hashedpwd, $current_date);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: ../signup.php?error=none");
		exit();
	}

	function emptyInputLogin($email, $password){
		$result;
		if (empty($email) || empty($password)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function loginUser($conn, $email, $password){
		$emailExist = emailexist($conn, $email);

		if ($emailExist === false) {
			header("location: ../login.php?error=wronglogin");
			exit();
		}

		$pwdHased = $emailExist['U_PASS'];
		$checkpwd = password_verify($password, $pwdHased);

		if ($checkpwd === false) {
			header("location: ../login.php?error=wronglogin");
			exit();
		}
		else if ($checkpwd === true) {
			session_start();
			$_SESSION["U_ID"] = $emailExist["U_ID"];
			$_SESSION["U_NAME"] = $emailExist["U_FNAME"]; 
			header("location: ../index.php");
			exit();
		}
	}