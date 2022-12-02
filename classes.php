<h2> Gestion des classes </h2>

<?php
	$unControleur->setTable ("classe"); 

	if( isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
	{
		$laClasse = null; 
		$lesEtudiants = null; 
		if (isset($_GET['action']) && isset($_GET['idclasse']))
		{
			$action = $_GET['action']; 
			$idclasse =$_GET['idclasse']; 

			switch($action){
				case "edit" : 	$laClasse = $unControleur->selectWhere ("idclasse",$idclasse) ; 
								//var_dump($laClasse);
								break; 
				case "sup"  : $unControleur->delete("idclasse", $idclasse);break;

				case "voir" : $lesEtudiants = $unControleur->selectEtudiantsClasse($idclasse); break;
			}
		}

		require_once("vue/vue_insert_classe.php");

		if (isset($_POST['Valider']))
		{
	
			$tab = array("nom"=> $_POST["nom"], "salle"=> $_POST["salle"], "diplome"=> $_POST["diplome"]);
			$unControleur->insert($tab); 
		}

		if (isset($_POST['Modifier']))
		{
			$tab = array("nom"=> $_POST["nom"], "salle"=> $_POST["salle"], "diplome"=> $_POST["diplome"]);
			$unControleur->update($tab, "idclasse", $_POST["idclasse"]);
			header("Location: index.php?page=1"); 
		}
	}
	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot']; 
		$tab = array("nom", "salle", "diplome");
		$lesClasses = $unControleur->selectLike($mot, $tab); 
	}
	else{
			$lesClasses = $unControleur->selectAll (); 
		}

	require_once("vue/vue_les_classes.php");
	echo "<br/> Le nombre de classes est de : ".$unControleur->count("classe")['nb'];
	echo "<br/> <br/>"; 
	if ($lesEtudiants != null){
		$laClasse = $unControleur->selectWhere("idclasse",$idclasse) ; 
		echo "<br/>Liste des étudiants de la classe : ".$laClasse['nom']."<br/>";
		require_once("vue/vue_etudiants_classe.php");
		
	}else 
	{
		echo "<br/> Aucun étudiant n'est affecté à cette classe"; 
	}
	echo "<br/> <br/> <br/> <br/> ";
?>









