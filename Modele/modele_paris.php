<?php
	require_once("modele_joueur.php");
	require_once("modele_evenement.php");
	class Paris {
		private $cx;
		
		public $joueur = null;
		public $event = null;
		public $optionChoisis = "";
		public $mise = -1;
		public $cote = -1;
		public $gain = -1;

		public function __construct($id = -1){
			require_once("../Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();

			if($id != -1 && is_numeric($id))
			{
				$req = $this->cx->prepare("SELECT * FROM paris WHERE id = :id");
				$req->execute(array(":id" => $id));
				$result = $req->fetch();
				if(count($result) > 0)
				{
					$this->id = $result["id"];
					$this->joueur = new Player($result["loginJoueur"]);
					$this->event = new Event($result["idEvent"]);
					$this->optionChoisis = $result["optionChoisis"];
					$this->mise = $result["mise"];
					$this->cote = $result["cote"];
					$this->gain = $result["gainRecupere"];
				}
			}
		}

		//retourne un curseur contenant l'objet associer � l'identifiant pass� en param�tre
		//on utilise ici la technique des requ�tes pr�par�es qui permettent d'�viter les injonctions SQL
		public function findById($idParis){
			//je re�ois ma requ�te SQL
			$req = "SELECT *
					FROM utilisateur
					WHERE id = :id";
			
			//je pr�pare ma requ�te
			$prep = $this->cx->prepare($req);
			
			//j'associe les param�tres
			$prep->bindValue(':id', $idParis, PDO::PARAM_STR);
			
			//j'ex�cute
			$prep->execute();
			
			//je remplis le curseur
			$curseur = $prep->fetchObject();
			return $curseur;
		}
		
		public function creerParis(){
			//Bool�en permettant de v�rifier l'�x�cution de la requ�te
			$valid=false;
		  
			//r�cup�ration des valeurs des champs:
			$loginJoueur=$_SESSION['login'];
			$idEvent=$_POST['paris-event'];
			$optionChoisis=$_POST['paris-option'];
			$gainRecupere=$_POST['paris-mise']*$_POST['paris-cote'];
			$mise=$_POST['paris-mise'];
			$cote=$_POST['paris-cote'];
			


			
			//cr�ation de la requ�te SQL:
			$sql="INSERT INTO paris(loginJoueur, idEvent, optionChoisis, gainRecupere, mise, cote)
				VALUES (:loginJoueur, :idEvent, :optionChoisis, :gainRecupere, :mise, :cote)";
				
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":loginJoueur",$loginJoueur,PDO::PARAM_STR);
			$requete->bindValue(":idEvent",$idEvent,PDO::PARAM_INT);
			$requete->bindValue(":optionChoisis",$optionChoisis,PDO::PARAM_STR);	
			$requete->bindValue(":gainRecupere",$gainRecupere,PDO::PARAM_STR);	
			$requete->bindValue(":mise",$mise,PDO::PARAM_STR);	
			$requete->bindValue(":cote",$cote,PDO::PARAM_STR);			
			
			
			//ex�cution de la requ�te SQL:
			$requete->execute();
			
			//r�cup�ration de l'ID ins�r�			
			//$new_recette = $this->cx->lastInsertId();
			
			//r�cup�ration des valeurs des champs:
			$argentRetire=$_POST['paris-mise'];
			
			//cr�ation de la requ�te SQL:
			$sql2="UPDATE utilisateur
				SET argent = argent-:argent
				WHERE login = :loginJoueur";
			
			$requete2 = $this->cx->prepare($sql2);
				
			//J'associe les valeurs
			$requete2->bindValue(":argent",$argentRetire,PDO::PARAM_STR);
			$requete2->bindValue(":loginJoueur",$loginJoueur,PDO::PARAM_STR);
			//$requete2->bindValue(":new_recette",$new_recette,PDO::PARAM_INT);
			
			//ex�cution de la requ�te SQL:
			$requete2->execute();
			
			if($requete && $requete2){
				$valid=true;
			}
			return $valid;
		}
		
		//Retourne un curseur contenant tous les paris
		public static function readAll(){
			require_once("../Modele/modele_connexion_base.php");
			$cx = Connexion::getInstance();

			$req = "SELECT *
					FROM event
					WHERE heureDebut >= DATE_ADD(now(),interval 2 hour);
					ORDER BY heureDebut ASC";
			$curseur=$cx->query($req);
			return $curseur;
		}
	}
?>