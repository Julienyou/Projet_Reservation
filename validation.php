<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validation de la reservation</title>
</head>
<body>
    <h1>Validation de la reservation</h1>
    <p> Veuillez confirmer les informations suivantes.</p>
<?php
	$information = unserialize($_SESSION['information']);
	echo '<p>';
	echo 'Destination           '.$information->get_destination();
	echo '<br>Nombres de places     '.$information->get_nbre_place();
	
	foreach($information->get_info_perso() as $info)
	{
		var_dump ($info);
		echo '<p>';
		echo 'Nom               '.$info[0].' '.$info[1];
		echo '<br>Age               '.$info[2];
	}
	
	echo '<p>';
	echo 'Assurance annulation       '.$information->get_assurance();
?>
	
	
	<form method='post' action='index.php?page=Reservation'>
		<input type='submit' value='Annuler la réservation'/>
	</form>
	
</body>
</html>