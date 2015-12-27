			
			<?php echo "<h1>Modification de ".$medecin['prenom']." ".$medecin['nom']."</h1>"; ?>

			<p style='text-align:center'>Vous pouvez modifier ici les informations du médecin</p>
			<form action='' method='post'>
			<label>Civilité :</label> 
				<select name='civilite'>
					<?php
						if ($medecin['civilite'] == 'M') {
							echo "<option value='M'>M</option>\n";
							echo "<option value='Mme'>Mme</option>\n";	
						}
						elseif ($medecin['civilite'] == 'Mme') {
							echo "<option value='Mme'>Mme</option>\n";	
							echo "<option value='M'>M</option>\n";
						}
					?>
				</select><br>
				<label>Nom :</label>
					<input type="text" name="nom" placeholder=<?php echo "'".$medecin['nom']."'"; ?> value=<?php echo "'".$medecin['nom']."'"; ?>><br>
				<label>Prénom :</label>
					<input type="text" name="prenom" placeholder=<?php echo "'".$medecin['prenom']."'"; ?> value=<?php echo "'".$medecin['prenom']."'"; ?>><br>
				<input type="reset"  value="Réinitialiser">
				<input type="submit" value="Enregistrer", name="posted">
			</form>	