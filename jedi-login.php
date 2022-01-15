<?php
session_start();
$token = sha1(uniqid(rand()));
$_SESSION['token'] = $token;
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* Website login page
	*/

	require_once "includes/header.php";
	require_once "includes/db.php";

?>

		<main id="pg-main-content">
			<div class="py-5 text-center container">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light">Jedi Blog</h1>
						<p class="lead text-muted">Your one stop shop for all Jedi knowledge.</p>
						<p class="lead text-muted">Sith, keep away!</p>
					</div>
				</div>
			</div>

			<div class="py-5 text-center container">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">
					<form class="form-signin" method="post" action="includes/login.php">
						<!-- Bootstrap Login form used from example on getbootstrap.com,
							available here: https://getbootstrap.com/docs/4.0/examples/sign-in/
						-->
						<input type="hidden" name="token" value="<?php echo  $token ?>">
						<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
						<input type="text" name="l-uname" id="input-uname" class="form-control" placeholder="Username" required autofocus>
						<br>
						<input type="password" name="l-pswd" id="input-password" class="form-control" placeholder="Password" required>
						<br>
						<input type="submit" name="submit-jedi-login" class="btn btn-lg btn-primary btn-block" value="Sign in">
					</form>
					</div>
				</div>
			</div>



		</main>

<?php
	require_once "includes/footer.php";
?>