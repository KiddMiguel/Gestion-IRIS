<h2> Gestion des enseignements</h2>

<?php
	$unControleur->setTable ("enseignement"); 

	if( isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		$unControleur->setTable ("classe"); 
		$lesClasses = $unControleur->selectAll ();

		$unControleur->setTable("professeur"); 
		$lesProfesseurs = $unControleur->selectAll();

		$unControleur->setTable ("enseignement"); 

		require_once("vue/vue_insert_enseignement.php");

		if (isset($_POST['Valider']))
		{
			$tab = array("matiere"=> $_POST["matiere"], "nbheures"=> $_POST["nbheures"], "coeff"=> $_POST["coeff"],"idclasse"=> $_POST["idclasse"], "idprofesseur"=> $_POST["idprofesseur"]);
			$unControleur->insert($tab); 
		}

	}
	if (isset($_POST['Filtrer']))
{
	$mot = $_POST['mot']; 
	$tab = array("matiere", "nbheures", "coeff");
	$lesEnseignements = $unControleur->selectLike($mot, $tab); 
}
else{
	$lesEnseignements = $unControleur->selectAll (); 
	}
	$lesEnseignements = $unControleur->selectAll (); 
	require_once("vue/vue_les_enseignements.php");	

	echo "<br/> Le nombre de matières est de : ".$unControleur->count("enseignement")['nb'];
?>