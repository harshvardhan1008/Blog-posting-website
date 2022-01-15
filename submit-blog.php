<?php
	session_start();
	ob_start();
?>
<?php
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* Blog page: read data from the DB in the form of JSON and display the contents
	* like blog articles using appropriate keys and values in JSON.
	*/

	require_once "includes/header.php";

	if (!isset($_SESSION['username'])) 
	{
		// access control
		header("Location: index.php?noaccess=1");
		die();
	} else {

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

			<div class="container">
				<section class="space-above-below">
					<h2 class="fw-light">Submit a blog</h2>

					<form method="post" action="includes/process-blog.php">
						<div class="form-row">
							<div class="form-group">
								<label for="blog-title">Blog Title</label>
								<input type="text" class="form-control" id="blog-title" name="blog-title" placeholder="Enter blog title here...">
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="form-group">
								<label for="input-category">Blog Category</label>
								<input type="text" class="form-control" id="input-category" name="blog-category" placeholder="Enter blog category here... (multiple categories must be separated by semi-colons)">
							</div>
						</div>
						<br>
						<div class="form-group">
							<label for="input-blog">Address</label>
							<textarea class="form-control" id="input-blog" name="blog-content" placeholder="Enter blog content here..." rows="10"></textarea>
						</div>
						<br>
						<input type="submit" name="submit-blog" class="btn btn-primary" value="Submit blog">
						<button type="button" class="btn btn-danger" onclick="checkRedirect()">Cancel &amp; go to home page</button>
					</form>
				</section>
			</div>
		</main>

<script src="js/scripts.js"></script>

<?php
	}
	
	require_once "includes/footer.php";

	ob_end_flush();
?>