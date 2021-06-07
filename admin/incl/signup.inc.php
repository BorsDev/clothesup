<?php

if (isset($_POST["submit"])) {
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$p_number = $_POST["Pnumber"];
	$wa_number = $_POST["WAnumber"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
	$photo = "user.png";
	$current_date = date("Y-m-d H:i:s");


	require_once "../../db/db.config.php";
	require_once 'function.inc.php';


	if (emptyInputSignup($fname, $lname, $email, $p_number, $wa_number ,$username, $pwd, $pwdrepeat) !== false) {
		header("location: ../admsignup.php?error=emptyinput");
		exit();
	}
	if (invalidUsername($username) !== false) {
		header("location: ../admsignup.php?error=invalidUsername");
		exit();
	}
	if (invalidEmail($email) !==false) {
		header("location: ../admsignup.php?error=invalidEmail");
		exit();
	}
	if (nmach($pwd, $pwdrepeat) !== false) {
		header("location: ../admsignup.php?error=pwdunmatch");
		exit();
	}
	if (uidexist($conn, $username, $email) !== false) {
		header("location: ../admsignup.php?error=usernameEmailTaken");
		exit();
	}

	createAdmin($conn, $photo, $fname, $lname, $email, $p_number, $wa_number ,$username, $pwd, $current_date);
}
else {
	header("location: ../admsignup.php");
	exit();
}