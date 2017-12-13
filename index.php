<?php																				/// include permet d'avoir encore acces aux variables de post donc si on include le controller on peut faire le $_SESSION
	session_start();
	require_once("Information.php");											    ///require_once permet de l'appeller qu'une fois pour toute la session
	
	$erreur = "no";
	
	if (!empty($_GET["page"]) && is_file($_GET["page"].".php"))
	{
		include $_GET["page"].".php";
	}	
	else
	{
		$information = new Information();
		$_SESSION['information'] = serialize($information);
		include "controler_Reservation.php";
	}
?>