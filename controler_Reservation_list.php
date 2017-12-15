<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "infos_client";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($mysqli->connect_error) 
	{
		die("Connection failed: " . $mysqli->connect_error);
	}
	
	$display = "";
	
	// Exécuter des requêtes SQL
	$query = "SELECT travel.ID, travel.Destination, travel.Assurance, travel.Total, client.Lastname, client.Firstname, client.Age FROM travel INNER JOIN client ON client.rel_travel = travel.ID";
	$result = $mysqli->query($query) or die("Query failed ");
	
	if ($result->num_rows == 0) 
	{
		$display .= "Aucune ligne trouvée, rien à afficher.";
		exit;
	}
	
	// Affichage des entêtes de colonnes
	
	$display .= "<table id='customers'>\n<tr>";
	while ($finfo = $result->fetch_field())
	{ 
		$display .=  '<th>'. $finfo->name .'</th>';
	}
	$display .= "<th> Editer </th>";
	$display .= "<th> Supprimer </th>";
	$display .=  "</tr>\n";
	
	// Afficher des résultats en HTML
	$actualID = -1;
	
	while ($line = $result->fetch_assoc()) //valeurs par ligne
	{ 
		if ($line['ID'] == $actualID)
		{	
			$display .=  "\t<tr>\n";
			$display .=  "\t\t<td></td>\n\t\t<td></td>\n\t\t<td></td>\n\t\t<td></td>\n";
			$display .=  "\t\t<td>".$line["Lastname"]."</td>\n";
			$display .=  "\t\t<td>".$line["Firstname"]."</td>\n";
			$display .=  "\t\t<td>".$line["Age"]."</td>\n";
			$display .=  "\t\t<td></td>\n";
			$display .=  "\t\t<td></td>\n";		
		}
		else if ($line['ID'] != $actualID)
		{
			$display .=  "\t<tr >\n";
			foreach ($line as $col_value) 
			{		//recupere chaque valeur de la ligne
				$display .=  "\t\t<td>$col_value</td>\n";
			}
			$display .= 
			"<td>
			<form method='post' action='index.php?page=controler_classe'>
				<input type='hidden' name='ID' value='".$line['ID']."'/>
				<input type='submit' value='Modifier'/>
			</form>
			</td>
			<td>
			</td>";
			$display .=  "\t</tr>\n";
			$actualID = $line['ID'];
		}
	}
	
	$display .=  "</table>\n";
	
	include 'Reservation_List.php'
?>