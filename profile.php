<?php
	session_start();
	if (!isset($_SESSION['username'])) 
	{
		// access control
		header("Location: index.php?noaccess=1");
		die();
	}
?>
<?php
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* Website profile page
	*/

	require_once "includes/header.php";
	require_once "includes/db.php";

?>

		<main id="pg-main-content">
			<div class="py-5 text-center container">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light">Jedi Blog: Your Profile</h1>
					</div>
				</div>
			</div>

			<div class="py-5 text-center container">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">
						<p class="lead text-muted">Full Name: <?php echo $_SESSION['username'];?></p>

						<?php
							$sql = "SELECT * FROM `jedilogin` WHERE `jedi_id`='{$_SESSION['user_id']}'";

							$result = $dbconnection->query($sql);

							if ($result->num_rows > 0) {
								$userRecord = $result->fetch_assoc();
								$uname = $userRecord['jedi_username'];
								$pswd = $userRecord['jedi_password'];
							}
						?>

						<label class="lead text-muted" for="uname-field">Username: </label>
						<input type="text" id="uname-field" disabled value="<?php echo $uname; ?>">

						<br>&nbsp;<br>

						<label class="lead text-muted" for="pswd-field">Password: </label>
						<input type="password" id="pswd-field" disabled value="<?php echo $pswd; ?>">

					</div>
				</div>
			</div>



		</main>

<?php
	require_once "includes/footer.php";
?>