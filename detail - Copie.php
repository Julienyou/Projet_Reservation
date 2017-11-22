<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail des reservation</title>
</head>
<body>
	<h1>Detail des reservations</h1>

    <?php																///mettre dans controller et limite utilisation $_SESSION que a la fin pour sauver!!! sinon trop lent!!!
		$_SESSION['destination'] = $_POST['destination'];
		$_SESSION['nbre_place'] = $_POST['nbre_place'];
		///$assurance = $_POST['assurance'];
		if (isset($_POST['assurance']))
		{
			$_SESSION['assurance'] = "OUI";
			echo $_SESSION['assurance'];
		;}
		else
		{
			$_SESSION['assurance'] = "NON";
			echo $_SESSION['assurance'];
		;}
		
		echo $_SESSION['destination'];
		echo $_SESSION['nbre_place'];
		echo $_SESSION['assurance'];
		
		for($i=0; $i<$_SESSION['nbre_place']; $i = $i + 1)
		{
			echo "<form method='post' action='validation.php'>";
			echo "Nom <input type='text' name='nom'> </br>";
			echo "Age <input type='text' name='age'> </br>";
		;}	
		
		echo "<input type='submit' value='Etape suivante' action='validation.php'/>";
		echo "</form>";
		echo "<form method ='post' action='Reservation.php'>";
		echo "<input type='submit' value='Retour à la page précédente'/>";
		echo "</form>";
		echo "<form method ='post' action='destruction_session.php'>";
		echo "<input type='submit' value='Annuler la réservation'/>";
		echo "</form>";
	?>
</body>
</html>
