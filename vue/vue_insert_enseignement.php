<h3> Ajout d'un enseignement</h3>
<form method="post">
	<table>
		<tr>
			<td> Matière  </td>
			<td> <input type="text" name="matiere"></td>
		</tr>
		<tr>
			<td> NB Heures </td>
			<td> <input type="text" name="nbheures"></td>
		</tr>
		<tr>
			<td> Coefficient </td>
			<td> <input type="text" name="coeff"></td>
		</tr>
		<tr>
			<td> La classe </td>
			<td> 
				<select name="idclasse">
					<?php
					foreach ($lesClasses as $uneClasse) {
					echo "<option value='".$uneClasse['idclasse']."'>"; 
					echo $uneClasse['nom']; 
					echo "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> Le Professeur </td>
			<td> 
				<select name="idprofesseur">
					<?php
					foreach ($lesProfesseurs as $unProfesseur) {
					echo "<option value='".$unProfesseur['idprofesseur']."'>"; 
					echo $unProfesseur['nom']; 
					echo "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td> <input type="submit" name="Valider" value="Valider"></td>
		</tr>
	</table>
</form>