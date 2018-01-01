<?php
	$information = unserialize($_SESSION['information']);
	
	//Check if there is at least one traveller major
	//if not, we return to the validation page
	//if it's ok, we continue
	if ($information->is_major() == "no")
	{
		include 'validation.php';
	}
	else
	{
		include 'controler_db.php';
	}
?>