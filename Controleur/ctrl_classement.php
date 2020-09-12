<?php
	date_default_timezone_set('Europe/Paris');
	require("../Modele/modele_classement.php");
		
	$r= new Classement();
	include("../utils/header.php");
	$lesClassements=$r->readAll();
	include("../Vue/vue_classement.php");

	include('../newStyle.css.php');
?>	
