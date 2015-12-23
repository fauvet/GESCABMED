
				<form action='' method='POST'>
					<table>
						<tr>
							<th id="th1">Nom médecin</th><th id="th2">Prénom médecin</th><th id="th3">Total des heures</th>
						</tr>
						<?php
							foreach ($horaires as $horaire) {
								echo "\t\t\t\t\t\t<tr>\n";
								echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$horaire['prenom']."</td>\n";
								echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$horaire['nom']."</td>\n";
								echo "\t\t\t\t\t\t\t<td class='tdcenter'>".$horaire['total']."></td>\n";
								echo "\t\t\t\t\t\t</tr>\n";
							}
						?>
					</table>
					<input type='submit' value='Supprimer'>
				</form>