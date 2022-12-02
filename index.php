<?php
	session_start(); 
	require_once("controleur/config_bdd.php"); 
	require_once("controleur/controleur.class.php"); 
	//intancier ma classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scolarité IRIS </title>
</head>
<body>
<center>
	<h1> Gestion de la scolarité IRIS</h1>

	<?php
	if ( ! isset($_SESSION['email'])){
		require_once("vue/vue_connexion.php");
	}
		if(isset($_POST['seConnecter']))
		{
			$email = $_POST['email']; 
			$mdp = $_POST['mdp']; 

			//hashage MD5 hash
			// $md5 = md5($mdp);

			//hachage en sha1
			// $mdp = sha1($mdp);
			

			//hachage avec un grain de sel 
			$unControleur ->setTable("grainSel");
			$result = $unControleur -> selectAll();
			$nb = $result[0]['nb'];
			$mdp = $mdp.$nb ;
			$mdp = sha1($mdp);
			$unUser = $unControleur->verifConnexion ($email, $mdp); 
			if ($unUser == null){
				echo "<br/> Vérifiez vos identifiants"; 
			}else {
				$today = date('Y-m-d');
				$dtmdp = $unUser['datemdp'];
				$debut = new DateTime($today);
				$fin = new DateTime ($dtmdp);
				$interva = $debut->diff ($fin);
				
				$_SESSION['iduser'] = $unUser['iduser']; 
				$_SESSION['email'] = $unUser['email']; 
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];

				if ( $interva -> format ("%a")> 20)
				{
					header("Location: index.php?page=6");
				}else {
					header("Location: index.php?page=0");
				}

			}
		}
	if (isset($_SESSION['email'])) 
	{
	echo '
		<a href="index.php?page=0">
			<img src="images/home.jpeg" height="100" width="100" >
		</a>
		<a href="index.php?page=1">
			<img src="images/classe.png" height="100" width="100" >
		</a>
		<a href="index.php?page=2">
			<img src="images/etudiant.png" height="100" width="100" >
		</a>
		<a href="index.php?page=3">
			<img src="images/professeur.png" height="100" width="100" >
		</a>
		<a href="index.php?page=4">
			<img src="images/enseignement.png" height="100" width="100" >
		</a>
		<a href="index.php?page=6">
			<img src="images/profil.png" height="100" width="100" >
		</a>
		<a href="index.php?page=5">
			<img src="images/deconnexion.jpeg" height="100" width="100" >
		</a>
	'; 

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else {
			$page = 0 ;
		}
		switch ($page){
			case 0 : require_once("home.php"); break;
			case 1 : require_once("classes.php"); break;
			case 2 : require_once("etudiants.php"); break;
			case 3 : require_once("professeurs.php"); break;
			case 4 : require_once("enseignements.php"); break;
			case 5 :   
					session_destroy(); 
					unset($_SESSION['email']);
					header("Location: index.php?page=0");
					break;
			case 6 : require_once("profil.php"); break;
			default : require_once("erreur_404.php"); break;
		}
	} //fin du if session 
?>
</center>
</body>
</html>















