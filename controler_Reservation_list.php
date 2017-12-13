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
	
	// Exécuter des requêtes SQL
	$query = "SELECT travel.ID, travel.Destination, travel.Assurance, travel.Total, client.Lastname, client.Firstname, client.Age FROM travel INNER JOIN client ON client.rel_travel = travel.ID";
	$result = $mysqli->query($query) or die("Query failed ");
	if ($result->num_rows == 0) 
	{
		echo "Aucune ligne trouvée, rien à afficher.";
		exit;
	}
	
	// Affichage des entêtes de colonnes
	echo "<table>\n<tr>";
	while ($finfo = $result->fetch_field())
	{ 
		echo '<th>'. $finfo->name .'</th>';
	}
	echo "</tr>\n";
	
	// Afficher des résultats en HTML
	$actualID = -1;
	
	while ($line = $result->fetch_assoc()) //valeurs par ligne
	{ 
	var_dump ($line);
		if ($line['ID'] == $actualID)
		{			
			echo "\t<tr>\n";
			foreach ($line as $col_value) //recupere chaque valeur de la ligne
			{
				echo "\t\t<td>$col_value</td>\n";
			}
		}
		else if ($line['ID'] != $actualID)
		{
			echo "\t<tr>\n";
			foreach ($line as $col_value) 
			{		//recupere chaque valeur de la ligne
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
			$actualID == $line['ID'];
		}
	}
	
	echo "</table>\n";
	
	include 'Reservation_List.php'
?>