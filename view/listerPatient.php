
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
							<th>Supprimer</th>
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
							echo ($patient['id_med'] != null)? $patient['medecin']['prenom']." ".$patient['medecin']['nom']: '';
							echo "</td>\n";

							//Checkbox de suppression
							echo "\t\t\t\t\t\t\t<td><input type='checkbox' name='p".$patient['id']."'></td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>					
						</tr>
					</table>
					<input type='submit' value='Supprimer'>
				</form>