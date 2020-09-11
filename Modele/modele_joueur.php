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
				$req = $this->cx->prepare("SELECT * FROM utilisateur WHERE id = :id;");
				$req->execute(array(":id" => $identifier));
			}
			else
			{
				$req = $this->cx->prepare("SELECT * FROM utilisateur WHERE login = :login1;");
				$req->execute(array(":login1" => $identifier));
			}
			$result = $req->fetch();
			if($result)
			{
				if(count($result) > 0)
				{
					$this->id = $result["id"];
					$this->login = $result["login"];
					$this->money = $result["argent"];
					$this->isAdmin = $result["isAdmin"];
				}
			}
		}

		public function connect($password)
		{
			$query = "SELECT mdp FROM utilisateur WHERE id = :id;";
			$req = $this->cx->prepare($query);
			$req->execute(array(":id" => $this->id));
			$result = $req->fetch();
			if(!$result)
				return false;

			return password_verify($password, $result['mdp']);
		}

		public function save()
		{
			$query = "SELECT * FROM utilisateur WHERE id = :id";
			$req = $this->cx->prepare($query);
			$req->execute(array(":id" => $this->id));
			if($req->fetch()) // L'utilisateur existe, on écrase les données
			{
				$query = "UPDATE utilisateur SET login = :login1, argent = :argent WHERE id = :id;";
				$req = $this->cx->prepare($query);
				$req->execute(array(
					":login1" => $this->login,
					":argent" => $this->money,
					":id" => $this->id
				));
			}
			else
			{
				$query = "INSERT INTO utilisateur (login, argent) VALUES (:login1, :argent);";
				$req = $this->cx->prepare($query);
				$req->execute(array(
					":login1" => $this->login,
					":argent" => $this->money
				));
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

		public function giveMoney($amount)
		{
			$this->money += $amount;
		}

		public function takeMoney($amount)
		{
			if(($this->money - $amount) < 0)
				return false;

			$this->money -= $amount;
			return true;
		}

		public function isAdmin()
		{
			return $this->isAdmin;
		}

		public function getBets()
		{
			$query = "SELECT paris.id FROM paris INNER JOIN event ON paris.idEvent = event.id WHERE paris.loginJoueur = :login1;";
			$req = $this->cx->prepare($query);
			$req->execute(array(
				":login1" => $this->login
			));
			$result = $req->fetchAll();
			$bets = array();
			foreach($result as $row)
			{
				$bet = new Paris($row['id']);
				array_push($bets, $bet);
			}
			return $bets;
		}

	}

?>