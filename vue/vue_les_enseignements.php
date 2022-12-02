<h3> Liste des Enseignements </h3>
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
		<td> Id Ensiegnement</td>
		<td>Matière </td>
		<td>NB Heures</td>
		<td> Coefficient</td>
		<td> Id Classe</td>
		<td> Id Professeur</td>
		</tr>
	<?php
	foreach ($lesEnseignements as $unEnseignement) {
	echo "<tr>";
	echo "<td>".$unEnseignement['idenseignement']."</td>"; 
	echo "<td>".$unEnseignement['matiere']."</td>"; 
	echo "<td>".$unEnseignement['nbheures']."</td>"; 
	echo "<td>".$unEnseignement['coeff']."</td>"; 
	echo "<td>".$unEnseignement['idclasse']."</td>";
	echo "<td>".$unEnseignement['idprofesseur']."</td>";
	echo "</tr>";
	}
	?>
</table>










