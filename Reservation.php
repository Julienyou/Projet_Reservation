<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
</head>
<body>
    <h1>RESERVATION</h1>
    <p> Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.</p>
    <p> Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>
	
    <form method='post' action='index.php?page=detail'>
		Destination <select name='destination'> </br>
			<option value="Londres"> Londres </option>
			<option value="Bruxelles"> Bruxelles </option>
			<option value="Amsterdam"> Amsterdam </option>
			<option value="Venise"> Venise </option>
		</select>
		
		</br>
		Nombre de places <input type='text' name='nbre_place'> </br>
		Assurance annulation <input type='checkbox' name='assurance'> </br>
		<input type='submit' value='Etape suivante'/> <input type='submit' value='Annuler la réservation' action = 'Reservation.php'/> //faire un nouveau form pour le deuxieme bouton
	</form>
		
		



</body>
</html>