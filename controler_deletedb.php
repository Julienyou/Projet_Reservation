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

	// sql to delete a record
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