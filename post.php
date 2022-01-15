<?php
	session_start();
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* Website post submission page
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

			<div class="container">
				<article class="space-above-below">

				<?php
						if (isset($_GET['post_id'])) {
							$sql = "select * from `jediblog` where `jedi_post_id`='" . $_GET['post_id'] . "'";

							$result = $dbconnection->query($sql);
	
							if ($result == null) {
								echo "Sorry, no blogs available for your search. Try searching with another keyword.";
							}
							elseif ($result->num_rows > 0) {
								$index = 1;
								while ($row = $result->fetch_assoc()) {
									//print_r($row);
									//echo "<br><br>";
?>

					<h2 class="fw-light"><?php echo $row['jedi_post_title'] ?></h2>
					<hr>
					<h5 class="fw-light">Posted by <?php echo $row['jedi_author']; ?> on <?php echo $row['jedi_post_date']; ?>, under: <?php echo $row['jedi_post_category']; ?></h5>
					<p class="text-muted"><?php echo $row['jedi_post_content']; ?></p>

					<!-- UPDATE THIS CODE HERE TO IMPLEMENT FUNCTIONALITY USING DATA FROM THE DATABASE -->
					<section id="<?php echo "result" . $index++; ?>" class="space-above-below">
						<h4 class="fw-light"></h4>
					</section>
<?php
								}
							}
							else {
?>
					<h2 class="fw-light">Search Results</h2>
					<hr>
<?php						
								echo "Sorry, no books available for your search. Try searching with another keyword.";
							}
						}

					?>
				</section>
			</div>
		</main>

<?php
	require_once "includes/footer.php";
?>