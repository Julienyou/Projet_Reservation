<?php
	if (isset($_POST['retour']) && $_POST['retour'] == "Retour a la page precedente")
	{
		$information = unserialize($_SESSION['information']);
		//$information->down_iteration();
		$information->reset_iteration();
		$_SESSION['information'] = serialize($information);
		include 'Reservation.php';
	}
	elseif (isset($_POST['retour2']) && $_POST['retour2'] == "Retour a la page precedente")
	{
		$information = unserialize($_SESSION['information']);
		$information->reset_iteration();
		$information->up_iteration();
		$_SESSION['information'] = serialize($information);
		include 'detail.php';
	}
	else
	{
		include 'Reservation.php';
	}
?>