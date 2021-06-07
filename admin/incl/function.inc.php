<?php

	function emptyInputSignup($fname, $lname, $email, $p_number, $wa_number ,$username, $pwd, $pwdrepeat){
		$result;
		if (empty($fname) || empty($email) || empty($username) || empty($pwd) ||empty($pwdrepeat) || empty($p_number) || empty($lname) || empty($wa_number)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidUsername($username){
		$result;
		if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
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

	function uidexist($conn, $username, $email){
		$sql = "SELECT * FROM `admin` WHERE ADM_UNAME = ? OR ADM_EMAIL=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../admsignup.php?error=stmterror");
			exit();
		}

		mysqli_stmt_bind_param($stmt,"ss", $username, $email);
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
	function createAdmin($conn, $photo, $fname, $lname, $email, $p_number, $wa_number ,$username, $pwd, $current_date){
		$sql = "INSERT INTO `admin` (`ADM_PHOTO`, `ADM_FNAME`, `ADM_LNAME`, `ADM_UNAME`, `ADM_EMAIL`, `ADM_PHONE_NUMBER`, `ADM_WA_NUMBER`, `ADM_PASSWORD`, `ADM_CREATE_TIME`, `ADM_UPDATE_TIME`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../admsignup.php?error=stmterror");
			exit();
		}

		$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt,"ssssssssss", $photo, $fname, $lname, $username, $email, $p_number, $wa_number, $hashedpwd, $current_date, $current_date);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: ../admsignup.php?error=none");
		exit();
	}
	function emptyInputLogin($username, $password){
		$result;
		if (empty($username) || empty($password)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function loginAdmin($conn, $username, $password){
		$uidExist = uidexist($conn, $username, $username);

		if ($uidExist === false) {
			header("location: ../admlogin.php?error=wronglogin");
			exit();
		}

		$pwdHased = $uidExist['ADM_PASSWORD'];
		$checkpwd = password_verify($password, $pwdHased);

		if ($checkpwd === false) {
			header("location: ../admlogin.php?error=wronglogin");
			exit();
		}
		else if ($checkpwd === true) {
			session_start();
			$_SESSION["ADM_ID"] = $uidExist["ADM_ID"];
			$_SESSION["ADM_UNAME"] = $uidExist["ADM_UNAME"];
			$_SESSION["ADM_PHOTO"] = $uidExist["ADM_PHOTO"]; 
			header("location: ../index.php");
			exit();
		}
	}