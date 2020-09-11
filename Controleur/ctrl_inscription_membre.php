<?php
    
	require ("../Modele/modele_joueur.php");
	
	include("../utils/header.php");
	if(isset($_GET['mem']))
	{
		$login = $_POST['conn_login'];
		$pass = password_hash($_POST['conn_pass'], PASSWORD_DEFAULT);

		$j = new Player($login);
		if($j->id == -1) // Le joueur n'existe pas
		{
			$j->setLogin($login);
			$j->setMoney(1000);
			$j->setPassword($pass);
			if($j->save()) header('Location: /Controleur/ctrl_connexion_membre.php?signup=true');
		}
		else
		{
			echo '
			<div class="alert alert-danger" role="alert">
				Ce login est déjà utilisé !
			</div>';
			include("../Vue/vue_inscription_membre.php");
			include('../newStyle.css.php');
		}
	}
	else
	{
		include("../Vue/vue_inscription_membre.php");
		include('../newStyle.css.php');
	}
?>