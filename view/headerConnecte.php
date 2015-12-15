
		<header>
			<a href=<?php echo "'".WEBROOT."accueil/deconnexion'" ?>>
			<div id='connecBox'>
				<span data-action='deconnecter'>Déconnexion<span>
			</div></a>

			<div id='Honglets'>
				<a href=<?php echo WEBROOT; ?> ><section>Accueil</section></a>

				<section>Patients
				<ul class='Hmenus'>
					<a href=<?php echo WEBROOT.'patient/ajouter'; ?>>     <li>Ajouter</li></a>
					<a href=<?php echo WEBROOT.'patient/lister'; ?>>      <li>Lister</li></a>
					<a href=<?php echo WEBROOT.'patient/statistiques'; ?>><li>Statistiques</li></a>
				</ul></section>

				<section>Médecins
				<ul class='Hmenus'>
					<a href=<?php echo "'".WEBROOT.'medecin/ajouter'."'"; ?>><li>Ajouter</li></a>
					<a href=<?php echo "'".WEBROOT.'medecin/lister'."'"; ?> ><li>Lister</li></a>
				</ul></section>

				<section>Consultations
				<ul class='Hmenus'>
					<a href=<?php echo "'".WEBROOT.'consultation/index'."'"; ?>    ><li>Créer</li></a>
					<a href=<?php echo "'".WEBROOT.'consultation/afficher'."'"; ?> ><li>Planning</li></a>
				</ul></section>
			</div>
		</header>