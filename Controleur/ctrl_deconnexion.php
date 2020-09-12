<?php
    date_default_timezone_set('Europe/Paris');
    session_start();
    session_unset();
	session_destroy();
	header('Location: ../index.php');
?>