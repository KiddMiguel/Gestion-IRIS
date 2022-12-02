<table border="1">
	<tr>
		<td> Id Etudiant</td>
		<td> Nom </td>
		<td> Prénom</td>
		<td> Email</td>
		</tr>
	<?php
	foreach ($lesEtudiants as $unEtudiant) {
		echo "<tr>";
		echo "<td>".$unEtudiant['idetudiant']."</td>"; 
		echo "<td>".$unEtudiant['nom']."</td>"; 
		echo "<td>".$unEtudiant['prenom']."</td>"; 
		echo "<td>".$unEtudiant['email']."</td>"; 
		echo "</tr>";
	}
	?>
</table>










