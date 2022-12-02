<h3> Liste des Etudiants </h3>
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
		<td> Id Etudiant</td>
		<td>Nom </td>
		<td>Prénom</td>
		<td> Email</td>
		<td> Id Classe</td>
		<?php
		if( isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
			echo " <td> Opérations </td> "; 
		}
		?>
		</tr>
	<?php
	foreach ($lesEtudiants as $unEtudiant) {
	echo "<tr>";
	echo "<td>".$unEtudiant['idetudiant']."</td>"; 
	echo "<td>".$unEtudiant['nom']."</td>"; 
	echo "<td>".$unEtudiant['prenom']."</td>"; 
	echo "<td>".$unEtudiant['email']."</td>"; 
	echo "<td>".$unEtudiant['idclasse']."</td>";
	if( isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	echo "<td>
		<a href='index.php?page=2&action=sup&idetudiant=".$unEtudiant['idetudiant']."'> 
		<img src='images/sup.png' height ='40' width='40'> </a>
		
		<a href='index.php?page=2&action=edit&idetudiant=".$unEtudiant['idetudiant']."'> 
		<img src='images/edit.png' height ='40' width='40'> </a>

		</td>";
	}
	echo "</tr>";
	}
	?>
</table>










