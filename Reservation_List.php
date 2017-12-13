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
	
	<table id = "customers">
		<tr>
			<th> Id	</th>
			<th> Destination </th>
			<th> Assurance </th>
			<th> Total </th>
			<th> Nom - Age </th>
			<th> Editer </th>
			<th> Supprimer </th>
		</tr>
		<tr>
			<td> 1	</td>
			<td> Venise </td>
			<td> OUI </td>
			<td> 45 </td>
			<td> Beard Julien - 20 <br> Merel Ludovic - 3 </td>
			<td> Editer </td>
			<td> Supprimer </td>
		</tr>
		<tr>
			<td> 1	</td>
			<td> Amsterdam </td>
			<td> NON </td>
			<td> 45 </td>
			<td> Beard Julien - 20 <br> Merel Ludovic - 3 </td>
			<td> Editer </td>
			<td> Supprimer </td>
		</tr>
		
	</table>
	</div>
</body>