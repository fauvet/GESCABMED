
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Civiltié</th> 
							<th>Prénom</th>
							<th>Nom</th>
							<th>Supprimer</th>
						</tr>
<?php
						foreach ($medecins as $medecin) {
							echo "\t\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$medecin['nom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$medecin['prenom']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$medecin['civilite']."</td>\n";
							echo "\t\t\t\t\t\t\t<td class='tdcenter'>"."<input type='checkbox' name='m".$medecin['id']."'></td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>
					</table>
					<input type='submit' value='Supprimer'>
				</form>