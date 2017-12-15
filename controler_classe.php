<?php
	if (isset($_SESSION['information']))
	{
		unset($_SESSION['information']);
	}
 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "infos_client";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	
	$information = new Information();	
	
	$ID = $_POST['ID'];
	
	$query = "SELECT travel.ID, travel.Destination, travel.Assurance, travel.Total,
			  travel.Nbre_place, client.Lastname, client.Firstname, client.Age FROM travel 
			  INNER JOIN client ON client.rel_travel = travel.ID && client.rel_travel = ".$ID;
	
	try
	{
		$result = $mysqli->query($query);
	}
	catch (Exception $e) 
	{
		echo 'Exception reçue : ',  $e->getMessage(), "\n";
	}
		
		
	$iteration = 0;
	
	while ($line = $result->fetch_assoc()) //valeurs par ligne
	{
		$information->set_info_perso([$line["Lastname"],$line["Firstname"],$line["Age"]],$iteration);
		$iteration += 1;
		var_dump ($line);
		$information->set_destination($line['Destination']);
		$information->set_assurance($line['Assurance']);
		$information->set_nbre_place($line['Nbre_place']);
		$information->set_montant($line['Total']);
		$information->set_modify();
	}
	
	var_dump ($information);

	$_SESSION['information'] = serialize($information);
	include 'Reservation.php'
?>