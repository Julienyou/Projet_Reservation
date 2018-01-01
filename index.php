<?php
	//Start a session
	session_start();

	/*Import the file for creating an objet which will contain
	  all informations about the travel and travellers*/
	require_once("Information.php");
	
	$erreur = "no";
	
	//Redirection to the page specified in the url
	if (!empty($_GET["page"]) && is_file($_GET["page"].".php"))
	{
		include $_GET["page"].".php";
	}	
	//If nothing is specified, redirection to the controler of the home page
	else
	{
		$information = new Information();
		$_SESSION['information'] = serialize($information);
		include "controler_Reservation.php";
	}
?>