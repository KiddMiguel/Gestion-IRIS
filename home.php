<h2> Ecole IRIS </h2>
<br/>
<?php
	echo "Bonjour, ".$_SESSION['nom']. "  ".$_SESSION['prenom']; 
	echo "<br/> Vous avez le rôle : ".$_SESSION['role'];
	echo "<br><br>"; 
	$lesResultats = $unControleur->selectAll(); 
	require_once ("vue/vue_classes_groupees.php");
?>
<br/>
<img src="images/iris.jpeg" height="500" width="600">
<br/>
<br/>
<a href="https://ecoleiris.fr">Rejoignez nous</a>