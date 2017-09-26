<?php

// On détruit la session
session_destroy();
 
// On redirige le visiteur vers la page d'accueil
include "index.php?page=Reservation.php";
?>