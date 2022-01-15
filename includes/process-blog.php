<?php
	session_start();
	ob_start();

	if (!isset($_SESSION['username'])) 
	{
		// access control
		header("Location: ../index.php?noaccess=1");
		die();
	}

	require_once "db.php";

	// Processing blog article that is submitted
	if (isset($_POST['submit-blog'])) 
	{
		$blogTitle = htmlspecialchars(stripslashes(trim($_POST['blog-title'])));
		$blogCategory = htmlspecialchars(stripslashes(trim($_POST['blog-category'])));
		$blogContent = htmlspecialchars(stripslashes(trim($_POST['blog-content'])));

		$sql = "INSERT INTO `jediblog` (`jedi_post_id`, `jedi_author`, `jedi_post_date`, `jedi_post_category`, `jedi_post_title`, `jedi_post_content`) VALUES (NULL, '{$_SESSION['username']}', curdate(), '{$blogCategory}', '{$blogTitle}', '{$blogContent}')";

		$result = $dbconnection->query($sql);

		if ($result) {
			//successful posting!
			header("Location: ../index.php?post-success=1");
			die();
		}
		else {
			echo "There was an error in submitting the post";
			die();
		}

	}

	// Blog article processing concludes

	ob_end_clean();
?>