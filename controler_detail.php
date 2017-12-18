<?php
	$information = unserialize($_SESSION['information']);
	$iteration = $information->get_iteration();

	if ($iteration == 1)
	{
		$information->set_destination($_POST['destination']);
		if (isset($_POST['nbre_place']) && $_POST['nbre_place'] == "")
		{
			$erreur = "yes";
			include "Reservation.php";
		}
		elseif (isset($_POST['nbre_place']) && ($_POST['nbre_place'] == 0 || $_POST['nbre_place'] > 10))
		{
			$erreur = "toomuch";
			include "Reservation.php";
		}
		else
		{
			$information->set_nbre_place($_POST['nbre_place']);
		}
	}
	
	$nbre_place = $information->get_nbre_place();

	if (isset($_POST['assurance']) && $iteration == 1)
	{
		$information->set_assurance("OUI");
	}
	elseif ($iteration == 1)
	{
		$information->set_assurance("NON");
	}
	
	$resultat = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
	
	if ($iteration > 1)
	{
		if ((isset($_POST['nom']) && $_POST['nom'] == "") || (isset($_POST['prenom']) && $_POST['prenom'] == "") || (isset($_POST['age']) && $_POST['age'] == ""))
		{
			$information->set_info_perso([$_POST['nom'],$_POST['prenom'],$_POST['age']],$iteration-2);
			$_SESSION['information'] = serialize($information);
			$erreur = "yes";
			include "detail.php";
		}
		elseif ($resultat === false)
		{
			$information->set_info_perso([$_POST['nom'],$_POST['prenom'],$_POST['age']],$iteration-2);
			$_SESSION['information'] = serialize($information);
			$erreur = "notint";
			include "detail.php";
		}
		else
		{
			$information->set_info_perso([$_POST['nom'],$_POST['prenom'],$_POST['age']],$iteration-2);
		}
	}
	
	if ($erreur == "no")
	{
		
		if ($iteration <= $nbre_place)
		{
			$information->up_iteration();
			$_SESSION['information'] = serialize($information);
			include 'detail.php';
		}
		else
		{
			$_SESSION['information'] = serialize($information);
			include 'controler_validation.php';
		}
	}
?>