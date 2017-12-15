<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Reservation_List.css" type="text/css" />
<head>
    <meta charset="UTF-8">
    <title>Liste des reservations</title>
</head>
<body>
	<h1> Liste des reservations </h1>
	
	<div>
	<form method='post' action='index.php?page=controler_Reservation'>
		<input type='submit' value='Ajouter une reservation'/>
	</form>
	
	<?php echo $display; ?>
	
	</div>
</body>