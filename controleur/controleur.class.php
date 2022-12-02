<?php
	//controle des données avant injection ou après extraction.
	require_once ("modele/modele.class.php");

	class Controleur {
		private $unModele ; //instance de la classe Modele 

		public function  __construct($serveur, $bdd, $user, $mdp){
			//instanciation de la classe Modele 
			$this->unModele= new Modele($serveur, $bdd, $user, $mdp);
		}
		public function setTable ($uneTable)
		{
			$this->unModele->setTable($uneTable);
		}

		public function selectAll ()
		{
			//récupération des Resultats  
			$lesResultats = $this->unModele->selectAll (); 
			//je réalise des traitements : controle des données 

			//je retourne mes résultats 
			return $lesResultats;
		}
		public function insert($tab)
		{
			//controle les donnees avant insertion 

			//insertion des données via le modele 
			$this->unModele->insert ($tab);
		}
		public function selectLike($mot, $tab)
		{
			$lesResultats = $this->unModele->selectLike($mot, $tab); 
			return $lesResultats;
		}
		public function delete($id, $valeur)
		{
			$this->unModele->delete($id, $valeur);
		}

		public function  selectWhere($id, $valeur)
		{
			return $this->unModele->selectWhere($id, $valeur);
		}

		public function update($tab,$id, $valeurId)
		{
			$this->unModele->update($tab, $id, $valeurId);
		}
		

		public function selectEtudiantsClasse ($idclasse)
		{
			//récupération des etudiants 
			$lesEtudiants = $this->unModele->selectEtudiantsClasse($idclasse); 
			//je retourne mes résultats 
			return $lesEtudiants;
		}


	

		


		

	
		/******************* USER *******************/
		public function verifConnexion ($email, $mdp)
		{
			return $this->unModele->verifConnexion2($email, $mdp); 
		}

		/********************* Autres methodes *************/
		public function count ($table)
		{
			return $this->unModele->count($table);
		}
	
	}
?>










