<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<head>
    <meta charset="UTF-8">
    <title>Validation de la reservation</title>
</head>
<body>
    <h1>Validation de la reservation</h1>
    <p> Veuillez confirmer les informations suivantes.</p>
<?php
	$information = unserialize($_SESSION['information']);
	
	//If there isn't one major traveller, we generate one error
	if ($information->is_major() == "no")
	{
		echo '<p id = erreur> Il faut au moins une personne majeure ! <p>';
	}

	/*Display all the informations*/
	
	echo '<div>';
	echo '<table><tr><td>Destination</td><td>	'.$information->get_destination().'</td></tr>';
	echo '<tr><td>Nombres de places</td><td>	'.$information->get_nbre_place().'</td></tr>';
	
	foreach($information->get_info_perso() as $info)
	{
		echo '<tr><td></td><td></td></tr>';
		echo '<tr><td>Nom</td><td>	'.$info[0].' '.$info[1].'</td></tr>';
		echo '<tr><td>Age</td><td>	'.$info[2].'</td></tr>';
	}
	
	echo '<tr><td></td><td></td></tr>';
	echo '<tr><td>Assurance annulation</td><td>	'.$information->get_assurance().'</td></tr></table>';
?>

	<form method ='post' action='index.php?page=controler_confirmation'>
		<input type='submit' value='Confirmer'/>
	</form>
	
	<form method ='post' action='index.php?page=controler_Reservation'>
		<input type='submit' name="retour2" value='Retour a la page precedente'/>
	</form>
	
	<form method='post' action='index.php?page=destruction_session'>
		<input type='submit' value='Annuler la reservation'/>
	</form>
</div>	
</body>
</html>