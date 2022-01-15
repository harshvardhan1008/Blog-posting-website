<?php
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* DB connection script
	*/
	$hostservername = "localhost"; 
	$username = "root";
	$password = "root";
	$dbname = "2170db";

	$dbconnection = new mysqli($hostservername, $username, $password, $dbname);

	if ($dbconnection->connect_error) {
		die("Nooooooooo<br>" . $dbconnection->connect_error);
	}
	else {
		//echo "<h1>Connected!</h1>";
	}

?>