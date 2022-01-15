<?php
session_start();

require_once "db.php";


if (isset($_POST['submit-jedi-login'])) 
{
	$fname = trim(stripslashes(htmlspecialchars($_POST['l-fname'])));
	$lname = trim(stripslashes(htmlspecialchars($_POST['l-lname'])));
	$email = trim(stripslashes(htmlspecialchars($_POST['l-email'])));
	$uname = trim(stripslashes(htmlspecialchars($_POST['l-uname'])));
	$pswd = trim(stripslashes(htmlspecialchars($_POST['l-pswd'])));
	
	$querySQL="select * from `jedilogin` where `jedi_firstname`='{$fname}' , `jedi_lastname`='{$lname}',`jedi_email`='{$email}',
	`jedi_username`='{$uname}' and `jedi_password`='{$pswd}'";
	$result = $dbconnection->query($querySQL);
	
	if ($result->num_rows > 0) {
			session_regenerate_id(true); //create new session and delete old session

			$userRecord = $result->fetch_assoc();

			// Create session variable when session is active
			$_SESSION['username'] = $userRecord['jedi_firstname'] . " " . $userRecord['jedi_lastname'];
			$_SESSION['user_id'] = $userRecord['jedi_id'];

			header("Location: ../index.php");
			die();
		}
		else {
			$pswd=password_hash($pswd, PASSWORD_DEFAULT);
			

			$querySQL="insert into  jedilogin (jedi_username,jedi_password,jedi_firstname,jedi_lastname,jedi_email) values ('$uname','$pswd','$fname','$lname','$email')";
			$result=$dbconnection->query($querySQL);
		
			// If user is not found, redirect to login page with error info.
			header("Location: ../jedi-login.php?loginerror=1");
			die();
		}	
	}
	else {

		// If login info is not submitted but someone tries to access this file, 
		// redirect user to login page with error info.
		header("Location: ../index.php?noaccess=1");
		die();
	}
	?>