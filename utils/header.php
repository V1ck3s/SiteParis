<?php

	session_start();
	if(!isset($_SESSION["prev_page"]))
	{
		$_SESSION["prev_page"] = "https://google.com";
	}

//	$_SESSION["prev_page"] = $_SESSION["curr_page"];
//	$_SESSION["curr_page"] = $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<html>
<?php 
		if(basename($_SERVER["SCRIPT_FILENAME"], '.php') != "index" && basename($_SERVER["SCRIPT_FILENAME"], '.php') != "ctrl_inscription_membre" ){
			include('../navBar.php');
		}
		
	
		?>
	<head>
		<title>Site de paris</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<meta name="google-site-verification" content="-OCWIqZiDm8eS9sBWqR9ifZW6BKQxMQZSBQ130puBUA" />
		<meta name="google-site-verification" content="9ibuz_jCYsmO3Ew9r42eS_JimEKEEZFzCea7mF4Yojw" />

		<meta name="description" content="Site de paris sportif.">
  		<meta name="keywords" content="paris, site, prono, samp, sampfr, pronostique">
  		<meta name="author" content="vic1997">

		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<!-- <link rel="stylesheet" href="https://papawy.com/assets/css/main.css" /> -->
		
		<link rel="icon" type="image/png" href="https://papawy.com/images/favicon.png">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--<noscript><link rel="stylesheet" href="https://papawy.com/assets/css/noscript.css" /></noscript>
		<script type="text/javascript" src="../assets/jquery.js"></script> -->
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
<html>
