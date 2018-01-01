<?php

//Unset destroys the session object information
if (isset($_SESSION['information']))
{
	unset($_SESSION['information']);
}

//Destroy the session
session_destroy();
 
//We redirect the client to the home page
header('location:index.php');
?>