<?php
	$information = unserialize($_SESSION['information']);
	$iteration = $information->get_iteration();

	if ($iteration == 1)
	{
		$information->set_destination($_POST['destination']);
		$information->set_nbre_place($_POST['nbre_place']);         ///verifier si int
	}

	$nbre_place = $information->get_nbre_place();	
	var_dump ($nbre_place);
	var_dump($information);
	
	///$assurance = $_POST['assurance'];
	if (isset($_POST['assurance']) && $iteration == 1)
	{
		$information->set_assurance("OUI");
	}
	elseif ($iteration == 1)
	{
		$information->set_assurance("NON");
	}
	
	if ($iteration > 1)
	{
		$information->set_info_perso([$_POST['nom'],$_POST['prenom'],$_POST['age']]);
	}
	
	var_dump($information);
	
	
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
?>