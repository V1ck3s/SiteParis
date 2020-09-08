<?php
    session_start();

	require("../Modele/modele_evenement.php");

	if(isset($_SESSION['login']))
	{
        if(isset($_POST['eventToDelete'])) // Un admin à supprimé un événement
        {
            $evt = new Event($_POST['eventToDelete']);
            if($evt->id != -1) // Existe
            {
                if($evt->delete())
                    echo "done";
                else
                    echo "error";
            }
            else
                echo "error_not_exist";
        }
    }
?>