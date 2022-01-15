<?php
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 4
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* Access control script to prevent access to the folder "includes"
	*/

	session_start();
	header("Location: ../index.php?noaccess=1");
	die();
?>