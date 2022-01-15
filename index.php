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
	* Website homepage
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

			<?php
				if(isset($_GET['success'])) {
			?>

			<div class="text-center">
				<p class="lead text-primary">Your post was submitted successfully!</p>
			</div>
			
			<?php
				}			
				else if(isset($_GET['noaccess']))
				{
			?>

			<div class="text-center">
				<p class="lead text-danger">You do not have access to the resource that you tried to access!</p>
			</div>

			<?php
				}
			?>

			<div class="container">
				<form class="col-lg-6 col-md-8 mx-auto">
					<input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search-keywords">
					<div class="space-above-below">
						<div>
							<input type="radio" class="form-check-input" name="search-type" id="search-type-name" value="author" checked>
							<label for="search-type-name" class="text-muted">Search by author name</label>
						</div>
						<div>
							<input type="radio" class="form-check-input" name="search-type" id="search-type-blog" value="book">
							<label for="search-type-blog" class="text-muted">Search by blog title</label>
						</div>
					</div>
				</form>
				
				<section class="space-above-below">
					<h2 class="fw-light">Recent Blogs</h2>
					<?php
						if (isset($_GET['search-keywords'])) {
							$sql = "select * from `jediblog`";

							if ($_GET['search-type'] == "author") {
								$sql .= " where jedi_author like '%" . $_GET['search-keywords'] . "%'";
							}
							else {
								$sql .= " where jedi_post_title like '%" . $_GET['search-keywords'] . "%'";
							}

							$result = $dbconnection->query($sql);
	
							if ($result == null) {
								echo "Sorry, no blogs available for your search. Try searching with another keyword.";
							}
							elseif ($result->num_rows > 0) {
								$index = 1;
								while ($row = $result->fetch_assoc()) {
?>
					<hr>
					<section id="<?php echo "result" . $index++; ?>" class="space-above-below">
						<h4 class="fw-light"><?php echo $row['jedi_post_title']; ?></h4>
						<h6 class="fw-light">Posted by <?php echo $row['jedi_author']; ?> on <?php echo $row['jedi_post_date']; ?></h6>
						<p class="text-muted"><?php echo substr($row['jedi_post_content'], 0, 200); ?>...</p>
						<a href="post.php?post_id=<?php echo $row['jedi_post_id']; ?>" role="button" class="btn btn-primary">More details &raquo;</a>
					</section>
<?php
								}
							}
							else {
?>
					<h2 class="fw-light">Search Results</h2>
					<hr>
<?php						
								echo "Sorry, no blogs available for your search. Try searching with another keyword.";
							}
						}
						else {
							$sql = "select * from `jediblog`";
							$result = $dbconnection->query($sql);
	
							if ($result == null) {
								echo "Sorry, no blogs yet! Coming soon!";
							}
							elseif ($result->num_rows > 0) {
								$index = 1;
								while ($row = $result->fetch_assoc()) {
?>
					<hr>
					<section id="<?php echo "result" . $index++; ?>" class="space-above-below">
						<h4 class="fw-light"><?php echo $row['jedi_post_title']; ?></h4>
						<h6 class="fw-light">Posted by <?php echo $row['jedi_author']; ?> on <?php echo $row['jedi_post_date']; ?></h6>
						<p class="text-muted"><?php echo substr($row['jedi_post_content'], 0, 200); ?>...</p>
						<a href="post.php?post_id=<?php echo $row['jedi_post_id']; ?>" role="button" class="btn btn-primary">More details &raquo;</a>
					</section>
<?php
								}
							}
						}

					?>
				</section>
			</div>
		</main>

<?php
	require_once "includes/footer.php";
?>