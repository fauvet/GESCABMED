			
			<h1>Modifier la consultation</h1>

			<p style='text-align:center;'>Vous pourvez ici modifier ou supprimer la consultation sélectionnée</p>

			<form action='' method='post'>
				<label>Patient :</label>
					<select name='patient'>
						<?php
						echo "\t\t\t\t\t\t<option value='".$pConsult['id']."' >".$pConsult['prenom'].' '.$pConsult['nom']."</option>\n";
						foreach ($tabPatient as $patient) {
							if($pConsult['id'] != $patient['id']){
								echo "\t\t\t\t\t\t<option value='".$patient['id']."' >".$patient['prenom'].' '.$patient['nom']."</option>\n";
							}
						}
						?>
					</select><br>
				<label>Médecin :</label>
					<select name='medecin'>
						<?php
						echo "\t\t\t\t\t\t<option value='".$mConsult['id']."' >".$mConsult['prenom'].' '.$mConsult['nom']."</option>\n";
						foreach ($tabMedecin as $medecin) {
							if($mConsult['id'] != $patient['id']){
								echo "\t\t\t\t\t\t<option value='".$medecin['id']."' >".$medecin['prenom'].' '.$medecin['nom']."</option>\n";
							}
						}
						?>
					</select><br>
				<label>Jour :</label>
					<input type="date" name="date" value=<?php echo "'".$rdv['date']."'";?>><br>
				<label>Heure :</label>
					<input type="time" name="heure"  value=<?php echo "'".$rdv['heure_debut']."'";?>><br>
				<label>Durée (en minutes) :</label>
					<input type="number" name="duree" value=<?php echo "'".$rdv['duree']."'";?>><br>

				<input type='submit' value="Supprimer"    >
				<input type="reset"  value="Réinitialiser">
				<input type="submit" value="Enregistrer"  >
			</form>