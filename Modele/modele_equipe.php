<?php
    class Team {
		private $cx;
		
		public function __construct(){
			require_once("../Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
        }
        
        public static function getAll()
        {
			require_once("../Modele/modele_connexion_base.php");
            $cx = Connexion::getInstance();
            $req = $cx->prepare("SELECT * FROM equipes WHERE 1");
            $req->execute();
            return $req->fetchAll();
        }

        public static function getNameById($id)
        {
			require_once("../Modele/modele_connexion_base.php");
            $cx = Connexion::getInstance();
            $req = $cx->prepare("SELECT nom FROM equipes WHERE id = :id");
            $req->execute(array(":id" => $id));
            $result = $req->fetch();
            return $result["nom"];
        }
    }

?>