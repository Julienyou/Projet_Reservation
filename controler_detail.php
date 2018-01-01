<?php
	$information = unserialize($_SESSION['information']);
	$iteration = $information->get_iteration();

	/*If it's the first time we come in this controller, we must verify
	  the input of the number of places from the previous page.*/
	if ($iteration == 1)
	{
		$information->set_destination($_POST['destination']);
		
		//Check if the client has filled the input box
		if (isset($_POST['nbre_place']) && $_POST['nbre_place'] == "")
		{
			$erreur = "yes";
			include "Reservation.php";
		}
		//Check if the client has filled the input box with a number between 1 and 10
		elseif (isset($_POST['nbre_place']) && ($_POST['nbre_place'] < 0 || $_POST['nbre_place'] > 10))
		{
			$erreur = "toomuch";
			include "Reservation.php";
		}
		//If everything is allright, we register the information about the number of places
		else
		{
			$information->set_nbre_place($_POST['nbre_place']);
		}
	}
	
	$nbre_place = $information->get_nbre_place();

	//The first time we must register the insurance information
	if (isset($_POST['assurance']) && $iteration == 1)
	{
		$information->set_assurance("OUI");
	}
	elseif ($iteration == 1)
	{
		$information->set_assurance("NON");
	}
	
	/*Resultat is false if the client hasn't filled
	  the age field with an integer or a number
	  between 0 and 120*/
	$options = array(
		'options' => array(	
			'min_range' => 0,	
			'max_range' => 120	
		)
	);
	$resultat = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options);
	
	//Iteration > 1 means that the client has to fill the name, lastname, age fields
	if ($iteration > 1)
	{
		//Check if the client has filled these input boxes
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
		//If everything is allright, we register the informations
		else
		{
			$information->set_info_perso([$_POST['nom'],$_POST['prenom'],$_POST['age']],$iteration-2);
		}
	}
	
	//Check if there aren't errors above
	if ($erreur == "no")
	{
		//Ask several times the travellers' informations (depends of the number of travellers)
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