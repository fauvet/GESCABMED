
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
<?php
	
	foreach ($agenda as $jour) {
		echo "\t\t\t\t<tr>\n";
		echo "\t\t\t\t\t<th>".$jour['j']."</th>\n";
		for ($h=8; $h <= 18; $h++) { 
			echo "\t\t\t\t\t<td>\n";
			if (array_key_exists( (($h<10)?'0'.$h:$h), $jour)) {
				foreach ($jour[$h] as $rdv) {
					echo "\t\t\t\t\t\t<div class='rdv'>\n";
					echo "\t\t\t\t\t\t\t<a href='".WEBROOT."consultation/profil/".$rdv['id']."'>".$rdv['medecin']."</a>\n";
					//Division cachée pour l'affichage de la consultation
					echo "\t\t\t\t\t\t\t<div class='afficheRDV'><p><b>Patient</b> : ".$rdv['patient']."<br><b>Médecin</b> : ".$rdv['medecin']."<br>";
					echo "<b>Heure</b> : ".substr($rdv['heure_debut'], 0, 5)."<br><b>Durée : </b>".$rdv['duree']." min</p></div>\n";
					echo "\t\t\t\t\t\t</div>\n";
				}
			}
			echo "\t\t\t\t\t</td>\n";
		}
		echo "\t\t\t\t</tr>\n";
	}
	
?>
