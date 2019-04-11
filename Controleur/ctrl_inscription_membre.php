<?php
    
	require ("../Modele/modele_inscription_membre.php");
			
	$cm= new InscriptionMembre();
	include("../utils/header.php");
	if(isset($_GET['mem']))
	{
		$existe=$cm->inscription();
		
		$login= $_POST['conn_login'];//identifiant de connexion
		/*if($existe==1)
		{
			$uneLigne=$cm->connection();
		}
		else //si la requete ne renvoie pas de ligne
		{
			//si erreur=true(mot de passe ou login incorrect alors on affiche un message d'erreur)
			echo"<script> alert ('Login ou Mot De Passe Incorrect !');</script>";
			// et redirection vers la page de connexion
			print ("<script language = \"JavaScript\">");
			print ("location.href = '../index.php';");
			print ("</script>");
		}*/
	}
	else
	{
		include("../Vue/vue_inscription_membre.php");
		include('../newStyle.css');
	}
?>