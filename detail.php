<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail des reservation</title>
</head>
<body>
	<h1>Detail des reservations</h1>

	<form method='post' action='index.php?page=controler_detail'>  ///a remplacer par validation
		Nom <input type='text' name='nom'> </br>
		Prénom <input type='text' name='prenom'> </br>
		Age <input type='text' name='age'> </br>	
		
		<input type='submit' value='Etape suivante'/>
	</form>
	
	<form method ='post' action='index.php?page=controler_Reservation'>
		<input type='submit' name="retour" value='Retour a la page precedente'/>
	</form>
	
	<form method ='post' action='index.php?page=destuction_session'>
		<input type='submit' value='Annuler la réservation'/>
	</form>
</body>
</html>