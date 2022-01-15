<?php
	/*
	 * Logout script: session destroy functionality implemented based on 
	 * the script available on PHP.net
	 * URL: https://www.php.net/manual/en/function.session-destroy.php
	 * Date accessed: 15 Mar 2021
	 * Author: PHP.net contributors
	 */

	// Initialize the session.
	// If you are using session_name("something"), don't forget it now!
	session_start();

	if (!isset($_SESSION['username'])) {
		// access control
		header("Location: ../index.php?noaccess=1");
		die();
	}

	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	// Finally, destroy the session.
	session_destroy();

	// Redirect the user to the homepage and kill the script.
	header("Location: ../index.php");
	die();

?>