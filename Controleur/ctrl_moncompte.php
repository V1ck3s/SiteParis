<?php
	date_default_timezone_set('Europe/Paris');
	require("../Modele/modele_joueur.php");
	require("../Modele/modele_paris.php");

	include("../utils/header.php");
	
	$joueur = new Player($_SESSION["login"]);

	include("../Vue/vue_moncompte.php");
	include('../newStyle.css.php');
?>	
