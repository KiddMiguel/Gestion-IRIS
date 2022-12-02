<h3> Ajout d'un étudiant</h3>
<form method="post">
	<table>
		<tr>
			<td> Nom  </td>
			<td> <input type="text" name="nom" 
				value="<?= ($lEtudiant != null) ? $lEtudiant['nom']:'' ?>"
				></td>
		</tr>
		<tr>
			<td> Prénom </td>
			<td> <input type="text" name="prenom"
				value="<?= ($lEtudiant != null) ? $lEtudiant['prenom']:'' ?>"
				></td>
		</tr>
		<tr>
			<td> Email </td>
			<td> <input type="text" name="email"
				value="<?= ($lEtudiant != null) ? $lEtudiant['email']:'' ?>"
				></td>
		</tr>
		<tr>
			<td> Classe de l'étudiant </td>
			<td> 
				<select name="idclasse">
					<?php
					foreach ($lesClasses as $uneClasse) {
					if ($lEtudiant!=null){
						if($lEtudiant['idclasse'] == $uneClasse['idclasse']){
							echo "<option value='".$uneClasse['idclasse']."' selected >"; 
						}else {
						echo "<option value='".$uneClasse['idclasse']."'>"; 
						}
					}else {
						echo "<option value='".$uneClasse['idclasse']."'>"; 
						}
					
					echo $uneClasse['nom']; 
					echo "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td> <input type="submit" 
				<?= ($lEtudiant != null) ? 'name="Modifier" value="Modifier"' : 
						'name="Valider" value="Valider"' ?>

				></td>
		</tr>
	<?= ($lEtudiant != null) ? '<input type="hidden" name="idetudiant" value="'.$lEtudiant['idetudiant'].'">' : '' ?>
	</table>
</form>