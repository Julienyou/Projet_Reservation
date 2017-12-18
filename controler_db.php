<?php
$information = unserialize($_SESSION['information']);
 
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

if ($information->get_modify() == "no")
{
	$sql2 = "INSERT INTO travel (Destination, Assurance, Nbre_place, Total)
			VALUES ('".$information->get_destination()."', '".$information->get_assurance()."', '".$information->get_Nbre_place()."', '".$information->get_montant()."')";
			
			if ($mysqli->query($sql2) === TRUE) {
				echo "New record created successfully";
				$id_insert = $mysqli->insert_id;
			} else {
				echo "Error: " . $sql2 . "<br>" . $mysqli->error;
			}

	foreach($information->get_info_perso() as $info)
		{
			$sql = "INSERT INTO client (Lastname, Firstname, Age, rel_travel)
					VALUES ('".$info[0]."', '".$info[1]."', '".$info[2]."', '".$id_insert."')";

			if ($mysqli->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}
		}
}
else
{
	
	$sql = "UPDATE travel 
			SET Destination='".$information->get_destination()."', 
				Assurance='".$information->get_assurance()."', 
				Nbre_place='".$information->get_Nbre_place()."',
				Total='".$information->get_montant()."'
			WHERE id=".$information->get_ID_vol()."";

	if ($mysqli->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}

	foreach($information->get_info_perso() as $info)
		{
			$ID = $information->get_ID();

			$sql2 = "UPDATE client 
				SET Lastname='".$info[0]."', 
					Firstname='".$info[1]."', 
					Age='".$info[2]."' 
				WHERE ID =".$ID."";

			$information->set_ID($ID + 1);

			if ($mysqli->query($sql2) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql2 . "<br>" . $mysqli->error;
			}
		}
	
}



$mysqli->close();

include 'confirmation.php'
?> 