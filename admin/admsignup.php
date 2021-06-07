<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--CSS Styling-->
	<link rel="stylesheet" href="CSS\style.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!--fontawesome css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

	<!--Owl Carousel-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />

</head>
<body style="background-color: #282d32">
	<section class="signup">
		<div class="container rounded bg-light my-5 mx-auto">
			<div class="row">
				<div class="py-5 mx-auto">
					<form action="incl/signup.inc.php" method="post">
						<h2 class="text-center">Sign Up</h2>
						<div class="row">
							<div class="col form-group">
								<label for="FName">First name</label>
								<input type="text" name="fname" class="form-control" id="FName" placeholder="First Name">
							</div>
							<div class="col form-group">
								<label for="LName">Last name</label>
								<input type="text" name="lname" class="form-control" id="LName" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col form-group">
								<label for="Userinput">Username</label>
								<input type="text" name="username" class="form-control" id="Userinput" placeholder="Username">
							</div>
							<div class="col form-group">
								<label for="Emailinput">Email</label>
								<input type="text" name="email" class="form-control" id="Emailinput" placeholder="Ex. yourname@hotmail.com">
							</div>
						</div>
						<div class="row">
							<div class="col form-group">
								<label for="PNumberinput">Phone Number</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">+62</div>
									</div>
									<input type="text" name="Pnumber" class="form-control" id="PNumberinput" placeholder="Phone Number">
								</div>
							</div>
							<div class="col form-group">
								<label for="WANumberInput">WA Number</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">+62</div>
									</div>
									<input type="text" name="WAnumber" class="form-control" id="WANumberInput" placeholder="Whats App Number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="Passwordinput">Password</label>
							<input type="password" name="pwd" class="form-control" id="Passwowrdinput" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="Passwordinput">Confirm Password</label>
							<input type="password" name="pwdrepeat" class="form-control" id="Passwowrdinput" placeholder="Password">
						</div>
					  	<button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
					  	<?php
					  	if (isset($_GET["error"])){
							if ($_GET["error"] == "emptyinput") {
								echo "<p>Fill All Fields</p>";
							}
							else if ($_GET["error"] == "invalidUsername") {
								echo "<p>Use Character a-z, A-Z, 0-9!</p>";
							}
							else if ($_GET["error"] == "invalidEmail") {
								echo "<p>Chechk your Email Format</p>";
							}
							else if ($_GET["error"] == "pwdunmatch") {
								echo "<p>Pasword Do Not Match</p>";
							}
							else if ($_GET["error"] == "usernameEmailTaken") {
								echo "<p>Email or Username taken</p>";
							}
							else if ($_GET["error"] == "stmterror") {
								echo "<p>Something went wrong, Please try again</p>";
							}
							else if ($_GET["error"] == "none") {
								echo "<p class='py-2'>You Have sign Up! Go To <a href='admlogin.php'>Login Page</a></p>";
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--JS Script-->
	<!--JQuery js-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<!--Popper js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous"></script>

	<!--app script-->
	<script src="js/app.js"></script>

	<!--bootstrap js-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

	<!--fontawesome js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

	<!--owl carousel js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    </body>
</html>