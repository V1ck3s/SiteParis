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
		if(basename($_SERVER["SCRIPT_FILENAME"], '.php') != "index"){
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
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
	</head>
<html>
