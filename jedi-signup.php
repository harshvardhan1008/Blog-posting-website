<?php
session_start();
?>
<?php
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
	if (isset($_POST['password'])) {
		$password = $_POST['password '];
		if (preg_match("^(?=.*[a-z]{2})(?=.*[A-Z]{2})(?=.*[0-9]{2})(?=.*[!@#\$%\^&\*]{2})", $password )){
			echo "Your password is strong.";
		}
		else {
			echo "Your password is not safe.";
		}
	}

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
					<form class="form-signin" method="post" action="includes/signup.php">
						<!-- Bootstrap Login form used from example on getbootstrap.com,
							available here: https://getbootstrap.com/docs/4.0/examples/sign-up/
						-->
						<h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
						<input type="text" name="l-fname" id="input-fname" class="form-control" placeholder="Firstname" required autofocus>
						<br>
						<input type="text" name="l-lname" id="input-lname" class="form-control" placeholder="Lastname" required autofocus>
						<br>
						<input type="text" name="l-uname" id="input-uname" class="form-control" placeholder="Username" required autofocus>
						<br>
						<input type="text" name="l-pswd" id="input-password" class="form-control" placeholder="Password" 
						onkeyup="passCheck(this.value)" required>
						<br>
						<input type="email" name="l-email" id="input-email" class="form-control" placeholder="Email" onkeyup="passemail(this.value)" required autofocus>
						<label id="error_msg"></label>
						<br>
						<input type="submit" name="submit-jedi-login" id="mySubmit" class="btn btn-lg btn-primary btn-block" value="Sign up">
					</form>
				</div>
			</div>
		</div>



	</main>

	<script type="text/javascript">
		function passCheck(data){
			var regix = new RegExp("^(?=.*[a-z]{2})(?=.*[A-Z]{2})(?=.*[0-9]{2})(?=.*[!@#\$%\^&\*]{2})");
			if(regix.test(data))
			{
				console.log("true");
				document.getElementById("mySubmit").disabled = false;
			}else{
				console.log("false");
				document.getElementById("mySubmit").disabled = true;
			}
		}
		function passemail(data)
		{
			if (data.endsWith('@theforce.org')) {
				console.log("true");
				document.getElementById('error_msg').innerHTML
                = 'Email is  Valid';
                document.getElementById("mySubmit").disabled = false;

			}else{
				console.log("false");
				document.getElementById('error_msg').innerHTML
                = 'Email is Not Valid';
                document.getElementById("mySubmit").disabled = true;

			}
		}
	</script>


	<?php
	require_once "includes/footer.php";
	?>