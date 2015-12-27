			
			<?php echo "<h1>Profil de ".$patient['prenom']." ".$patient['nom']."</h1>"; ?>

			<p style='text-align:center'>Vous pouvez modifier ici les informations du patient</p>

			<form action='' method='post'>

				<label>Civilité :</label> 
				<select name='civilite'>
					<?php
						if ($patient['civilite'] == 'M') {
							echo "<option value='M'>M</option>\n";
							echo "<option value='Mme'>Mme</option>\n";	
						}
						elseif ($patient['civilite'] == 'Mme') {
							echo "<option value='Mme'>Mme</option>\n";	
							echo "<option value='M'>M</option>\n";
						}
					?>
				</select><br>

				<label for='i1'>Nom :</label>
					<input class='ajoutPatient' id='i1' type='text' name='nom' placeholder=<?php echo "'".$patient['nom']."'"?> value=<?php echo "'".$patient['nom']."'"?>><br>
				<label for='i2'>Prenom :</label>
					<input class='ajoutPatient' id='i2' type='text' name='prenom' placeholder=<?php echo "'".$patient['prenom']."'"?> value=<?php echo "'".$patient['prenom']."'"?>><br>
				<label for='i3'>Date de naissance :</label>
					<input class='ajoutPatient' id='i3' type='date' name='date_naissance' placeholder=<?php echo "'".$patient['date_naissance']."'"?> value=<?php echo "'".$patient['date_naissance']."'"?>><br>
				<label for='i4'>Lieu de naissance :</label>
					<input class='ajoutPatient' id='i4' type='text' name='lieu_naissance' placeholder=<?php echo "'".$patient['lieu_naissance']."'"?> value=<?php echo "'".$patient['lieu_naissance']."'"?>><br>
				<label for='i5'>Adresse :</label>
					<input class='ajoutPatient' id='i5' type='text' name='adresse' placeholder=<?php echo "'".$patient['adresse']."'"?> value=<?php echo "'".$patient['adresse']."'"?>><br>
				<label for='i5'>Code postal :</label>
					<input class='ajoutPatient' id='i6' type='text' name='cp' placeholder=<?php echo "'".$patient['cp']."'"?> value=<?php echo "'".$patient['cp']."'"?>><br>
				<label for='i7'>Ville :</label>
					<input class='ajoutPatient' id='i7' type='text' name='ville' placeholder=<?php echo "'".$patient['ville']."'"?> value=<?php echo "'".$patient['ville']."'"?>><br>
				<label for='i8'>Numéro de sécurité sociale :</label>
					<input class='ajoutPatient' id='i8' type='text' name='num_secu' placeholder=<?php echo "'".$patient['num_secu']."'"?> value=<?php echo "'".$patient['num_secu']."'"?>><br>

				<label for='selectMedecin'>Médecin traitant :</label>
					<select id='selectMedecin' name='medecin'>
<?php                   //On affiche le médecin référent en premier s'il est défini
						echo "\t\t\t\t\t\t<option".(($medRef == false)?" value = 'Aucun'>Aucun" :  " value='".$medRef['id']."' >".$medRef['prenom'].' '.$medRef['nom']
							     ."</option>\n\t\t\t\t\t\t<option value='Aucun'>Aucun")."</option>\n";
						foreach ($tabMedecin as $med) {
							if(!$medRef || (array_key_exists('id', $medRef) && $med['id'] != $medRef['id'])){
								echo "\t\t\t\t\t\t<option value='".$med['id']."' >".$med['prenom'].' '.$med['nom']."</option>\n";
							}
						}
						?>
					</select><br>

				<input type='reset' value='Réinitialiser'>
				<input type='submit' value='Enregistrer' name='posted'>

			</form>