
			<h1>Planning des consultations de la semaine</h1>		
			<div id='Nsemaine'>
				<a href=<?php echo "'".WEBROOT."consultation/afficher/".($semPre)."'"; ?> class='boutonSem'>Précédent</a>	
				<a href=<?php echo "'".WEBROOT."consultation/afficher/".($semSui)."'"; ?> class='boutonSem'>Suivant</a>
			</div>
			<table id='calendrier'>
				<tr>
					<th>Jour</th>
					<td>8 h</td>
					<td>9 h</td>
					<td>10 h</td>
					<td>11 h</td>
					<td>12 h</td>
					<td>13 h</td>
					<td>14 h</td>
					<td>15 h</td>
					<td>16 h</td>
					<td>17 h</td>
					<td>18 h</td>
				</tr>
				<tr>
					<th><?php echo $jSem[0] ?></th><td><a class='rdv' href=''></a></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<th><?php echo $jSem[1] ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<th><?php echo $jSem[2] ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<th><?php echo $jSem[3] ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<th><?php echo $jSem[4] ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<th><?php echo $jSem[5] ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>