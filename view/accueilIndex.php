
			<h1>Site de gestion du cabinet médical</h1>

			<p>Passez la souris sur les images des différentes sections répertoriées afin d'avoir accès à tous les liens du site.<br><br>
			A travers les différentes pages de ce site <b>génialissime</b> vous pourrez effectuer différentes tâches parmi lesquelles : </p>

			<div class='boxAccueil'>
				<div class='encart' id='encartPatient'>
					<ul class='ongletAccueil'>
						<li>PATIENTS</li>
						<a href=<?php echo WEBROOT.'patient/ajouter'; ?> ><li>Nouvel enregistrement</li></a>
						<a href=<?php echo WEBROOT.'patient/lister'; ?> ><li>Liste des patients</li></a>
						<a href=<?php echo WEBROOT.'patient/statistiques'; ?> ><li>Statistiques</li></a>
					</ul>
				</div>
				<h2>Gestion des patients</h2>
				<p>	Vous pouvez dans cette section gérer la liste des patients du cabinet. Pour en enregistrer un, il vous suffit
					de cliquer sur nouvel enregistrement. Pour visualiser le listing complet des patients cliquez sur "liste des patients".
					Vous pourrez ensuite afficher ou modifier des informations qui les concernent, et même supprimer le patient de la base de données.
					Enfin vous avez la possibilités de visualiser quelques statistiques sur l'ensemble des patients dans la partie "Statistiques".
				</p>
			</div>

			<div class='boxAccueil' id='medecin'>
				<div class='encart' id='encartMedecin'>
					<ul class='ongletAccueil'>
						<li>MEDECINS</li>
						<a href=<?php echo WEBROOT.'medecin/ajouter'; ?> ><li>Nouvel enregistrement</li></a>
						<a href=<?php echo WEBROOT.'medecin/index'; ?> ><li>Liste des médecins</li></a>
					</ul>
				</div>
				<h2>Gestion des médecins</h2>
				<p>	Vous pouvez ici gérer l'effectif des médecins travaillant au cabinet. Pour en enregistrer un, il vous suffit
					de cliquer sur "nouvel enregistrement". Pour visualiser le listing complet des médecins cliquez sur "liste des médecins".
					Vous pourrez à partir de cette page afficher, modifier ou supprimer un médecin.
				</p>
			</div>

			<div class='boxAccueil' id='rdv'>
				<div class='encart' id='encartRDV'>
					<ul class='ongletAccueil'>
						<li>CONSULTATIONS</li>
						<a href=<?php echo WEBROOT.'consultation/index'; ?>    ><li>Ajouter une consultation</li></a>
						<a href=<?php echo WEBROOT.'consultation/afficher'; ?> ><li>Afficher le planning</li></a>
					</ul>
				</div>
				<h2>Gérer les consultations et les RDV patients - médecins</h2>
				<p>Dans cette dernière section vous pouvez créer et plannifier de nouvelles consultations entre médecins et patients. Pour ce faire
					cliquez sur "Ajouter une consultation". Si vous souhaitez afficher le planning des rendez-vous déjà prévus 
					ou bien les supprimer, cliquez sur "Afficher le planning".
				</p>
			</div>