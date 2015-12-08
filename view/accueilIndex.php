
			<h1>Site de gestion du cabinet médical</h1>

			<p>Bienvenue sur le site de l'hôpital de l'IUT informatique. Survolez les images afin de faire le menu. Vous pourrez effectuer différentes tâches parmi lesquelles : </p>

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
				<p>	Vous pouvez dans cette section gérer la liste des patients du cabinet. Pour en enregistrer un nouveau, il vous suffit
					de cliquer sur <b>Nouvel enregistrement</b>. Pour visualiser le listing complet des patients cliquez sur <b>Liste des patients</b>.
					Vous pourrez alors afficher ou modifier l'intégralité des informations.
					Enfin vous avez la possibilités de visualiser quelques statistiques sur l'ensemble des patients dans la partie <b>Statistiques</b>.
				</p>
			</div>

			<div class='boxAccueil' id='medecin'>
				<div class='encart' id='encartMedecin'>
					<ul class='ongletAccueil'>
						<li>MEDECINS</li>
						<a href=<?php echo WEBROOT.'medecin/ajouter'; ?> ><li>Nouvel enregistrement</li></a>
						<a href=<?php echo WEBROOT.'medecin/lister'; ?> ><li>Liste des médecins</li></a>
					</ul>
				</div>
				<h2>Gestion des médecins</h2>
				<p>	Vous pouvez ici gérer l'effectif des médecins travaillant au cabinet. Pour en enregistrer un nouveau , il vous suffit
					de cliquer sur <b>Nouvel enregistrement</b>. Pour visualiser le listing complet des médecins cliquez sur <b>Liste des médecins</b>.
					Vous pourrez à partir de cette page afficher, modifier ou retirer un médecin.
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
				<h2>Gérer les consultations patients - médecins</h2>
				<p>Dans cette dernière section vous pouvez créer et plannifier de nouvelles consultations entre médecins et patients. Pour ce faire
					cliquez sur <b>Ajouter une consultation</b>. Si vous souhaitez afficher ou modifier le planning de l'ensemble des rendez-vous,
					cliquez sur <b>Afficher le planning</b>.
				</p>
			</div>