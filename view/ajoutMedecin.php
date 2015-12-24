			
			<h1>Enregistrer un nouveau médecin</h1>

			<form action='' method='post'>
				<label>Civilité :</label> 
				<select name='civilite'>
					<option value='M'>M</option>
					<option value='Mme'>Mme</option>
				</select><br>
				<label>Nom :</label>
					<input type="text" name="nom" placeholder="Durand"><br>
				<label>Prénom :</label>
					<input type="text" name="prenom" placeholder="Hérvé"><br>
				<input type="reset"  value="Réinitialiser">
				<input type="submit" value="Enregistrer", name="posted">
			</form>