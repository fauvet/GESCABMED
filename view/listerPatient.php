
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
							//On récupère le médecin traitant du patient en cours
							$medecin = Medecin::selectByID($patient['id_med']);

							//On affiche le contenu du tableau
							echo "\t\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['prenom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['nom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['adresse'].", ".$patient['cp']." ".$patient['ville']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['date_naissance']."</td>\n";							
							echo "\t\t\t\t\t\t\t<td>".$patient['lieu_naissance']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$patient['num_secu']."</td>\n";
							echo "\t\t\t\t\t\t\t<td>".$medecin['prenom']." ".$medecin['nom']."</td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>					
						</tr>
					</table>
					<input type='submit' value='Supprimer'>
				</form>