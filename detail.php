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
		Pr�nom <input type='text' name='prenom'> </br>
		Age <input type='text' name='age'> </br>	
		
		<input type='submit' value='Etape suivante'/>
	</form>
	
	<form method ='post' action='index.php?page=Reservation'>
		<input type='submit' value='Retour � la page pr�c�dente'/>
	</form>
	
	<form method ='post' action='index.php?page=destuction_session'>
		<input type='submit' value='Annuler la r�servation'/>
	</form>
</body>
</html>