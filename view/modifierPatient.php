			
			<?php echo "<h1>Profil de ".$patient['prenom']." ".$patient['nom']."</h1>"; ?>
			<h2>Vous pouvez modifier ici les informations du patient</h2>

			<form action='' method='post'>

				<label>Civilité :</label> 
				<select name='civilite'>
					<option value='M'>M</option>
					<option value='M'>Mme</option>
				</select><br>

				<label for='i1'>Nom :</label>
					<input class='ajoutPatient' id='i1' type='text' name='nom' placeholder='Dupont' ><br>
				<label for='i2'>Prenom :</label>
					<input class='ajoutPatient' id='i2' type='text' name='prenom' placeholder='Paul' ><br>
				<label for='i3'>Date de naissance :</label>
					<input class='ajoutPatient' id='i3' type='date' name='date_naissance' ><br>
				<label for='i4'>Lieu de naissance :</label>
					<input class='ajoutPatient' id='i4' type='text' name='lieu_naissance' placeholder='Ville (XX)' ><br>
				<label for='i5'>Adresse :</label>
					<input class='ajoutPatient' id='i5' type='text' name='adresse' placeholder='123 rue xyz' ><br>
				<label for='i5'>Code postal :</label>
					<input class='ajoutPatient' id='i6' type='text' name='cp' placeholder='75001' ><br>
				<label for='i7'>Ville :</label>
					<input class='ajoutPatient' id='i7' type='text' name='ville' placeholder='Paris' ><br>
				<label for='i8'>Numéro de sécurité sociale :</label>
					<input class='ajoutPatient' id='i8' type='text' name='num_secu' placeholder='1 99 99 99 999 999 99' ><br>

				<label for='selectMedecin'>Médecin traitant :</label>
					<select id='selectMedecin' name='patient'>
						<option value='Aucun'>Aucun</option>
<?php
						foreach ($tabMedecin as $patient) {
							echo "\t\t\t\t\t\t<option value='".$patient['id']."' >".$patient['prenom'].' '.$patient['nom']."</option>\n";
						}
						?>
					</select><br>

				<input type='reset' value='Réinitialiser'>
				<input type='submit' value='Enregistrer' name='posted'>

			</form>