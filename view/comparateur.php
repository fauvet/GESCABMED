
				<table>
					<tr>
						<th id="th1">Nom médecin</th><th id="th2">Prénom médecin</th><th id="th3">Total des heures</th>
					</tr>
					<?php
						foreach ($horaires as $horaire) {
							echo "\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t\t<td class='tdcenter'>".$horaire['prenom']."</td>\n";
							echo "\t\t\t\t\t\t<td class='tdcenter'>".$horaire['nom']."</td>\n";
							echo "\t\t\t\t\t\t<td class='tdcenter'>";
								$heure = intval($horaire['total']/60);
								$heure = ($heure < 10) ? "0".$heure : $heure;
								$minute = $horaire['total'] - ($heure * 60);
								$minute = ($minute < 10) ? "0".$minute : $minute; 
								echo $heure."h".$minute."min</td>\n";
							echo "\t\t\t\t\t</tr>\n";
						}
					?>
				</table>