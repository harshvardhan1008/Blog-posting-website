/*
 * CSCI 2170: ONLINE EDITION, WINTER 2021
 * STARTER CODE FOR ASSIGNMENT 4
 * 
 * This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
 *
 * Main JavaScript file for the website.
 */

function checkRedirect() {
	let userChoice = window.confirm("Are you sure you want to clear all content and move to the home page? All changes will be lost and this action is not reversible. Please confirm.")

	if (userChoice == true) {
		window.location = "index.php"
	}
}