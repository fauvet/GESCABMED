		
				<h1>Liste des patients inscrits</h1>

				<form action='' method='POST'>
					<table id='afficherPatient'>
						<tr>
							<th>Civilité</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Adresse complète</th>
							<th>Date de naissance</th>
							<th>Lieu de naissance</th>
							<th>Num de sécu</th>
							<th>Médecin référent</th>
							<th>Supprimer</th>
						</tr>
<?php
						foreach ($patients as $patient) {
							//On affiche le contenu du tableau
							echo "\t\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'><a class='profilLink' href='".WEBROOT."patient/profil/".$patient['id']."'></a>".$patient['civilite']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['nom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['prenom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['adresse'].", ".$patient['cp']." ".$patient['ville']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['date_naissance']."</td>\n";							
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['lieu_naissance']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$patient['num_secu']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".(($patient['id_med'] != null)? $patient['medecin']['prenom']." ".$patient['medecin']['nom']: '')."</td>\n";
							echo "\t\t\t\t\t\t\t<td><input type='checkbox' name='p".$patient['id']."'></td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>
					</table>
					<input type='submit' value='Supprimer'>
				</form>