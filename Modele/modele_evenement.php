<?php
	require_once('modele_joueur.php');
	class Event {
		//attribut priv� qui recevra une instance de la connexion
		private $cx;
		
		public $id = -1;
		public $premiereOption = "";
		public $deuxiemeOption = "";
		public $troisiemeOption = "";
		public $cotePremiere = 0.0;
		public $coteDeuxieme = 0.0;
		public $coteTroisieme = 0.0;
		public $heureDebut = "";
		public $heureFin = "";
		public $optionGagnant = "";

		public function __construct($id = -1) {
			require_once("../Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();

			if($id != -1 && is_numeric($id))
			{
				$req = $this->cx->prepare("SELECT * FROM event WHERE id = :id");
				$req->execute(array(":id" => $id));
				$result = $req->fetch();
				if($result)
				{
					if(count($result) > 0)
					{
						$this->id = $result["id"];
						$this->premiereOption = $result["premiereOption"];
						$this->deuxiemeOption = $result["deuxiemeOption"];
						$this->troisiemeOption = $result["troisiemeOption"];
						$this->cotePremiere = $result["cotePremiere"];
						$this->coteDeuxieme = $result["coteDeuxieme"];
						$this->coteTroisieme = $result["coteTroisieme"];
						$this->heureDebut = $result["heureDebut"];
						$this->heureFin = $result["heureFin"];
						$this->optionGagnant = $result["optionGagnant"];
					}
				}
			}
		}
		
		public function save() {
			$query = "INSERT INTO `event` 
				(`premiereOption`, `deuxiemeOption`, `troisiemeOption`, `cotePremiere`, `coteDeuxieme`, `coteTroisieme`, `heureDebut`, `heureFin`, `optionGagnant`) 
				VALUES 
				(:premiereOption,:deuxiemeOption,:troisiemeOption,:cotePremiere,:coteDeuxieme,:coteTroisieme,:heureDebut,:heureFin,'')";

			$req = $this->cx->prepare($query);
			$req->execute(array(
				":premiereOption" => $this->premiereOption,
				":deuxiemeOption" => $this->deuxiemeOption,
				":troisiemeOption" => $this->troisiemeOption,
				":cotePremiere" => $this->cotePremiere,
				":coteDeuxieme" => $this->coteDeuxieme,
				":coteTroisieme" => $this->coteTroisieme,
				":heureDebut" => $this->heureDebut,
				":heureFin" => $this->heureFin
			));
			return $req->rowCount() > 0;
		}

		public function delete() {
			$query = "DELETE FROM paris WHERE idEvent = :id";
			$req = $this->cx->prepare($query);
			$req->execute(array(":id" => $this->id));

			$query = "DELETE FROM event WHERE id = :id";
			$req = $this->cx->prepare($query);
			$req->execute(array(":id" => $this->id));
			return $req->rowCount() > 0;
		}
		
		public function validate() {
			$query = "UPDATE event SET optionGagnant = :winner WHERE id = :id";

			$req = $this->cx->prepare($query);
			$req->execute(array(
				":winner" => $this->optionGagnant,
				":id" => $this->id
			));

			$query = "SELECT loginJoueur, optionChoisis, gainRecupere FROM paris WHERE idEvent = :id";
			$reqSelect = $this->cx->prepare($query);

			$query = "UPDATE paris SET argentRecup = 1 WHERE idEvent = :id AND optionChoisis = :winner";
			$reqUpdateParis = $this->cx->prepare($query);

			$reqSelect->execute(array(
				":id" => $this->id
			));

			while($row = $reqSelect->fetch())
			{
				$reqUpdateParis->execute(array(
					":id" => $this->id,
					":winner" => $this->optionGagnant
				));
				if($reqUpdateParis->rowCount() > 0)
				{
					$j = new Player($row['loginJoueur']);
					$j->giveMoney($row['gainRecupere']);
					$j->save();
				}
			}

			return $req->rowCount() > 0;
		}
		
		//Retourne un tableau contenant tous les paris jouables
		public static function getAllNext() {
            require_once("../Modele/modele_connexion_base.php");
            $cx = Connexion::getInstance();
            $j = new Player($_SESSION['idUtil']);
            if($j->id != -1)
            {
                $req = "SELECT *
                        FROM event 
                        WHERE heureDebut > DATE_ADD(now(),interval 2 hour);
                        ORDER BY heureDebut DESC";
                        
                if($j->isAdmin())
                {
                    $req = "SELECT *
                            FROM event 
                            WHERE 1
                            ORDER BY heureDebut DESC";
                }
                $curseur = $cx->query($req);
                return $curseur->fetchAll();
            }
            else return [];
        }
	}
?>
