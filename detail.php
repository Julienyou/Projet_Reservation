<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<head>
    <meta charset="UTF-8">
    <title>Detail des reservation</title>
</head>
<body>
	<?php
	$information = unserialize($_SESSION['information']);
	$info = $information->get_info_perso();
	$iteration = $information->get_iteration();
	?>
	
	<h1>Detail des reservations<br><small>Passager <?php echo $iteration-1 ?></small></h1>

	<?php

	/*Check if the next controller "controler_detail" 
	  has generated an error and display the error message*/
	if ($erreur == "yes")
	{
		echo '<p id = erreur> Remplissez tous les champs svp ! <p>';
	}
	
	if ($erreur == "notint")
	{
		echo '<p id = erreur> Remplissez le champ "age" par un nombre entier compris entre 0 et 120 svp ! <p>';
	}
	?>

	<div>
		<form method='post' action='index.php?page=controler_detail'>
			Nom <input type='text' name='nom' value = '<?php if (isset($info[$iteration-2])) echo $info[$iteration-2][0];?>'> </br>
			Prenom <input type='text' name='prenom' value = '<?php if (isset($info[$iteration-2])) echo $info[$iteration-2][1];?>'> </br>
			Age <input type='text' name='age' value = '<?php if (isset($info[$iteration-2])) echo $info[$iteration-2][2];?>'> </br>	
			
			<input type='submit' value='Etape suivante'/>
		</form>
		
		<form method ='post' action='index.php?page=controler_Reservation'>
			<input type='submit' name="retour" value='Retour a la page precedente'/>
		</form>
		
		<form method ='post' action='index.php?page=destuction_session'>
			<input type='submit' value='Annuler la reservation'/>
		</form>
	</div>
</body>
</html>