<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/validation.css" type="text/css" />
<head>
    <meta charset="UTF-8">
    <title>Validation de la reservation</title>
</head>
<body>
    <h1>Validation de la reservation</h1>
    <p> Veuillez confirmer les informations suivantes.</p>
<div>
<?php
	$information = unserialize($_SESSION['information']);
	
	if ($information->is_major() == "yes")
	{
		echo '<p id = erreur> Il faut au moins une personne majeure ! <p>';
	}
	echo $information->is_major();
	var_dump($information);
	
	echo '<p>';
	echo 'Destination           '.$information->get_destination();
	echo '<br>Nombres de places     '.$information->get_nbre_place();
	
	foreach($information->get_info_perso() as $info)
	{
		echo '<p>';
		echo 'Nom               '.$info[0].' '.$info[1];
		echo '<br>Age               '.$info[2];
	}
	
	echo '<p>';
	echo 'Assurance annulation       '.$information->get_assurance();
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
	
	<!-->
	Maintenant il faut que quand on appuie sur bouton precedent on retourne au client 1 pour se faire mettre
	l'iterateur a 1 et mettre comme dans la premiere page des valeurs par defaut donc simplement parcourir la liste deja faite
	et remplir
	<!-->
	
</body>
</html>