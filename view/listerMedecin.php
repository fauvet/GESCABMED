
				<form action='' method='POST'>
					<table>
						<tr>
							<th id="th1">Prénom</th><th id="th2">Nom</th><th id="th3">Supprimer</th>
						</tr>
<?php
						foreach ($medecins as $medecin) {
							echo "\t\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t\t<td>".$medecin['prenom']."</td><td>".$medecin['nom']."</td><td>"
								."<input type='checkbox' name='m".$medecin['id']."'></td>\n";
							echo "\t\t\t\t\t\t</tr>\n";
						}?>					
						</tr>
					</table>
					<input type='submit' value='Supprimer'>
				</form>