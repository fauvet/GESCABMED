			
			<h1>Enregistrer une nouvelle consultation</h1>

			<form action='' method='post'>
				<label>Patient :</label>
					<select name='patient'>
						<option value='Aucun'>Aucun</option>
						<?php
						foreach ($tabPatient as $patient) {
							echo "\t\t\t\t\t\t<option value='".$patient['id']."' >".$patient['prenom'].' '.$patient['nom']."</option>\n";
						}
						?>
					</select><br>
				<label>Médecin :</label>
					<select name='medecin'>
						<option value='Aucun'>Aucun</option>
						<?php
						foreach ($tabMedecin as $medecin) {
							echo "\t\t\t\t\t\t<option value='".$medecin['id']."' >".$medecin['prenom'].' '.$medecin['nom']."</option>\n";
						}
						?>
					</select><br>
				<label>Jour :</label>
					<input type="date" name="date"><br>
				<label>Heure :</label>
					<input type="time" name="heure"><br>
				<label>Durée (en minutes) :</label>
					<input type="number" name="duree" value='30'><br>

				<input type="reset"  value="Réinitialiser">
				<input type="submit" value="Enregistrer"  >
			</form>