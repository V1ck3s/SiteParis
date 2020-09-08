<?php
    class Player {
		private $cx;
        
        public $id = -1;
        private $login = "";
        private $money = -1;
        private $isAdmin = 0;
        
		public function __construct($identifier){
			require_once("../Modele/modele_connexion_base.php");
            $this->cx = Connexion::getInstance();

            if(is_numeric($identifier))
            {
                $req = $this->cx->prepare("SELECT * FROM utilisateur WHERE id = :id");
                $req->execute(array(":id" => $identifier));
            }
            else
            {
                $req = $this->cx->prepare("SELECT * FROM utilisateur WHERE login = :login");
                $req->execute(array(":login" => $identifier));
            }
            $result = $req->fetch();
            if(count($result) > 0)
            {
                $this->id = $result["id"];
                $this->login = $result["login"];
                $this->money = $result["argent"];
                $this->isAdmin = $result["isAdmin"];
            }
        }

        public function getLogin()
        {
            return $this->login;
        }

        public function getMoney()
        {
            return $this->money;
        }

        public function isAdmin()
        {
            return $this->isAdmin;
        }

    }

?>