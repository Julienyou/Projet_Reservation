<?php																				/// include permet d'avoir encore acces aux variables de post donc si on include le controller on peut faire le $_SESSION
	session_start();
		if (!empty($_GET["page"]) && is_file($_GET["page"].".php"))
		{
        	include $_GET["page"].".php";
    	}	
		else
		{
        	include "reservation.php";
        }
	?>