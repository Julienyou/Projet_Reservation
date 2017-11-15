<?php
	if (isset($_POST['retour']) && $_POST['retour'] == "Retour a la page precedente")
	{
		$information = unserialize($_SESSION['information']);
		$information->down_iteration();
		$_SESSION['information'] = serialize($information);
		include 'Reservation.php';
	}
	else
	{
		include 'Reservation.php';
	}
?>