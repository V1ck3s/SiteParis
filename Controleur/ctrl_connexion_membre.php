<?php
	date_default_timezone_set('Europe/Paris');
	require ("../Modele/modele_joueur.php");

	if(isset($_POST['loginForm']))
	{
		$j = new Player($_POST["conn_login"]);
		if($j->id != -1) // Si l'utilisateur existe
		{
			if($j->connect($_POST["conn_pass"]))
			{
				session_start();
				$_SESSION['userLog'] = 1;
				$_SESSION['login'] = $j->getLogin();
				$_SESSION['idUtil'] = $j->id;
				header('Location:/Controleur/ctrl_accueil_paris.php');
			}
			else
			{
				echo '
				<div class="alert alert-danger" role="alert">
					Login ou mot de passe incorrect.
				</div>';
				include("../index.php");
			}
		}
		else
		{
			echo '
			<div class="alert alert-danger" role="alert">
				Login ou mot de passe incorrect.
			</div>';
			include("../index.php");
		}
	}
	else
	{
		if(isset($_GET['signup']))
		{
			if($_GET['signup'])
				echo '
				<div class="success alert-success" role="alert">
					Inscription réussie.
				</div>';
		}
		include("../index.php");
	}
?>