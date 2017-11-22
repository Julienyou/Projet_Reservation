<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
</head>
<body>
	<h1> Confirmation des reservations </h1>

	<?php $information = unserialize($_SESSION['information']); ?>

	<p> Votre demande a bien ete enregistree.</p>
	<p> Merci de bien vouloir verser la somme de <?php echo $information->get_montant() ?>&euro; sur le compte 000 - 000000 - 00 </p>

	<form method='post' action='index.php?page=destruction_session'>
		<input type='submit' value='Annuler la reservation'/>
	</form>
</body>