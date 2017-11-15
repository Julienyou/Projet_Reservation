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
	
	<?php $information = unserialize($_SESSION['information']); ?>
	
    <form method='post' action='index.php?page=controler_detail'>
	<?php
		$destinations = array('Londres','Bruxelles','Amsterdam','Venise');
		
		echo "Destination <select name='destination'> </br>";
		
			foreach ($destinations as $destination)
			{
				if ($destination == $information->get_destination())
				{
					echo '<option value ="'.$destination.'" selected="'.selected.'">'.$destination.'</option>';
				}
				else
				{
					echo '<option value="'.$destination.'">'.$destination.'</option>';
				}
			}
	?>
		</select>
		
		</br>
		Nombre de places <input type='text' name='nbre_place' value = '<?php if ($information->get_nbre_place() != null) echo $information->get_nbre_place();?>'> </br>
		Assurance annulation <input type='checkbox' name='assurance' <?php if ($information->get_assurance() == 'OUI') echo 'checked' ?>> </br>
		<input type='submit' value='Etape suivante'/> 
	</form>
	
	<form method='post' action='index.php?page=Reservation'>
		<input type='submit' value='Annuler la réservation'/>
	</form>
	
</body>
</html>