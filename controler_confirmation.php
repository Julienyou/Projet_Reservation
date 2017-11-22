<?php
	$information = unserialize($_SESSION['information']);
	
	if ($information->is_major() == "yes")
	{
		include 'validation.php';
	}
	else
	{
		include 'confirmation.php';
	}
?>