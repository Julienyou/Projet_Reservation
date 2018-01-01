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
    
    $ID = $_POST['ID'];

    /*Request to delete the travel line with the good ID
      Travellers are automatically deleted too because of
      a cascade link between table in the database*/
    $sql = "DELETE FROM travel WHERE ID=".$ID."";

    if ($mysqli->query($sql) === TRUE) 
    {
            echo "Record deleted successfully";
    } 
    else 
    {
        echo "Error deleting record: " . $mysqli->error;
    }

    $mysqli->close();

    header('location:index.php?page=controler_Reservation_list');
?>