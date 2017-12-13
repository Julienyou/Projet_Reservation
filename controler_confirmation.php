<?php
	$information = unserialize($_SESSION['information']);
	
	if ($information->is_major() == "no")
	{
		include 'validation.php';
	}
	else
	{
		include 'controler_db.php';
	}
?>