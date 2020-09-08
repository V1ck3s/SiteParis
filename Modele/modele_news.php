<?php

	class News {
		//attribut priv� qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("../Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT *
					FROM news 
					ORDER BY id DESC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		//retourne un curseur contenant l'objet associer � l'identifiant pass� en param�tre
		//on utilise ici la technique des requ�tes pr�par�es qui permettent d'�viter les injonctions SQL
		public function findById($idNews){
			//je re�ois ma requ�te SQL
			$req = "SELECT *
					FROM news
					WHERE id = :id";
			
			//je pr�pare ma requ�te
			$prep = $this->cx->prepare($req);
			
			//j'associe les param�tres
			$prep->bindValue(':id', $idNews, PDO::PARAM_STR);
			
			//j'ex�cute
			$prep->execute();
			
			//je remplis le curseur
			$curseur = $prep->fetchObject();
			return $curseur;
		}
		
		public function create(){

		}
	}
?>
