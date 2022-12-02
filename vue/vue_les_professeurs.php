<h3> Liste des Professeurs </h3>
<br/>
<form method="post">
	Filtrer par : 
	<input type="text" name="mot">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/>
<br/>
<table border="1">
	<tr>
		<td> Id Professeur</td>
		<td>Nom </td>
		<td>Prénom</td>
		<td> Diplôme</td>
		 
		</tr>
	<?php
	foreach ($lesProfesseurs as $unProfesseur) {
	echo "<tr>";
	echo "<td>".$unProfesseur['idprofesseur']."</td>"; 
	echo "<td>".$unProfesseur['nom']."</td>"; 
	echo "<td>".$unProfesseur['prenom']."</td>"; 
	echo "<td>".$unProfesseur['diplome']."</td>"; 
	 
	echo "</tr>";
	}
	?>
</table>










