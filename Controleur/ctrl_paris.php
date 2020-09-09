<?php
	require("../Modele/modele_paris.php");
	require("../Modele/modele_equipe.php");
	require("../Modele/modele_joueur.php");
	require("../Modele/modele_evenement.php");

	include("../utils/header.php");

	$joueur = new Player($_SESSION["login"]);

	if(isset($_SESSION['login']))
	{	
		if($_POST != null)
    	{
			if(isset($_POST['paris-option'])) // Un joueur a parié
			{
				if($_POST['paris-mise'] > $joueur->getMoney() || $_POST['paris-mise'] <= 0){
					header('Location: ../Controleur/ctrl_accueil_paris.php');
				}
				else{
					echo "<script type=\"text/javascript\">alert(\"".$_POST['paris-mise']." ".$joueur->getMoney()."Tricher c'est pas bien.\nArrête maintenant et joue sans tricher.\");</script>";
					$r = new Paris();
					$reussi = $r->creerParis();
					if($reussi){
						header('Location: ../Controleur/ctrl_moncompte.php');
					}
					else{
						
					}
				}
			}
			elseif(isset($_POST['input_eventStartDate'])) // Un admin à créé un événement
			{
				$startDate = new DateTime($_POST["input_eventStartDate"]);
				$endDate = new DateTime($_POST["input_eventEndDate"]);

				$evt = new Event();
				$evt->premiereOption = Team::getNameById($_POST["list_team1"]);
				$evt->deuxiemeOption = "NUL";
				$evt->troisiemeOption = Team::getNameById($_POST["list_team2"]);;
				$evt->cotePremiere = $_POST["input_odds1"];
				$evt->coteDeuxieme = $_POST["input_oddsnull"];
				$evt->coteTroisieme = $_POST["input_odds2"];
				$evt->heureDebut = $startDate->format("Y-m-d") . " " . $_POST["input_eventStartTime"];
				$evt->heureFin = $endDate->format("Y-m-d") . " " . $_POST["input_eventEndTime"];
				$evt->optionGagnant = "";

				if($evt->save())
					echo '<div class="alert alert-success" role="alert">
							Pari crée !
						</div>';
				else
					echo '
						<div class="alert alert-danger" role="alert">
							Erreur lors de la sauvegarde de l\'évenement !
						</div>';
				include("../Vue/vue_paris.php");
				include('../newStyle.css.php');
			}
			elseif(isset($_POST['list_winner'])) // Un admin à validé un événement
			{
				$id = $_POST['bet_id'];
				$winner = $_POST['list_winner'];

				$evt = new Event($id);
				switch($winner)
				{
					case 1: // Equipe 1 gagnante
						$evt->optionGagnant = $evt->premiereOption;
					break;
					case "null": // Match nul
						$evt->optionGagnant = $evt->deuxiemeOption;
					break;
					case 2: // Equipe 2 gagnante
						$evt->optionGagnant = $evt->troisiemeOption;
					break;
				}

				if($evt->validate())
					echo '<div class="alert alert-success" role="alert">
							Pari validé, les joueurs ont reçu leurs gains !
						</div>';
				else
					echo '
						<div class="alert alert-danger" role="alert">
							Erreur lors de la validation de l\'évenement !
						</div>';
				include("../Vue/vue_paris.php");
				include('../newStyle.css.php');
			}
		}
		else
		{
			include("../Vue/vue_paris.php");
			include('../newStyle.css.php');
		}
	}
	else{
		header('Location: ../Controleur/ctrl_accueil_paris.php');
	}
	
?>	
