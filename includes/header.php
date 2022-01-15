<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Jedi Blog</title>
	
		<!-- Bootstrap core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">	

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
  	</head>
  	<body>	
		<header id="pg-header">
			<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php">Jedi Blog</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarsExample02">
						<ul class="navbar-nav me-auto">
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="index.php">Home</a>
							</li>

					<?php 
						if (isset($_SESSION['username'])) {
					?>
					
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="submit-blog.php">Post a Blog</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="profile.php">Profile</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="includes/logout.php">Logout</a>
							</li>
					<?php
						}
						else {
					?>
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="jedi-login.php">Login</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" aria-current="page" href="jedi-signup.php">Register</a>
							</li>
					<?php
						}
					?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
