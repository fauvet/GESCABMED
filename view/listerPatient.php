
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Prénom</th>
							<th>Nom</th>
							<th>Adresse complète</th>
							<th>Date de naissance</th>
							<th>Lieu de naissance</th>
							<th>Num de sécu</th>
							<th>Médecin traitant</th>
						</tr>
<?php
						foreach ($patients as $patient) {
							//On affiche le contenu du tableau
							echo "\t\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['prenom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['nom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['adresse'].", ".$patient['cp']." ".$patient['ville']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['date_naissance']."</td>\n";							
							echo "\t\t\t\t\t\t\t<td>".$patient['lieu_naissance']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['num_secu']."</td>\n";

							//Affichage du médecin traitant

							echo "\t\t\t\t\t\t\t<td>";
							echo ($patient['id_med'] != null)? $medecin['medecin']['prenom']." ".$medecin['medecin']['nom']: '';
							echo "</td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>					
						</tr>
					</table>
					<input type='submit' value='Supprimer'>
				</form>