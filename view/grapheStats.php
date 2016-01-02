				Affichage de la répartition des usagers selon les criètes suivant : 
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Tranche d'âge</th>
							<th>Nombre d'hommes</th>
							<th>Nombre de femmes</th>
						</tr>
						
						<tr>
							<td><?php echo "Moins de 25 ans"; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbH25']; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbF25']; ?></td>
						</tr>

						<tr>
							<td><?php echo "Entre 25 et 50 ans"; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbH25a50']; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbF25a50']; ?></td>
						</tr>

						<tr>
							<td><?php echo "Plus de 50 ans"; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbH50']; ?></td>
							<td class="tdcenter"><?php echo $donnees['nbF50']; ?></td>
						</tr>
					</table>
				</form>