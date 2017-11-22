<?php
if (isset($_SESSION['information']))
{
	unset($_SESSION['information']);
}
//unset($_SESSION['information']);
// On détruit la session
session_destroy();
 
// On redirige le visiteur vers la page d'accueil
header('location:index.php');
?>