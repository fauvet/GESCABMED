			
			<?php echo "<h1>Modification de ".$medecin['prenom']." ".$medecin['nom']."</h1>"; ?>

			<form action='' method='post'>
				<label>Nom :</label>
					<input type="text" name="nom" placeholder=<?php echo "'".$medecin['prenom']."'"; ?> value=<?php echo "'".$medecin['prenom']."'"; ?>><br>
				<label>Prénom :</label>
					<input type="text" name="prenom" placeholder=<?php echo "'".$medecin['nom']."'"; ?> value=<?php echo "'".$medecin['nom']."'"; ?>><br>
				<input type="reset"  value="Réinitialiser">
				<input type="submit" value="Enregistrer", name="posted">
			</form>	