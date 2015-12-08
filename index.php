<?php
/*********************************************
****	GESTION GLOBALE PHP DU SITE		*****
*********************************************/

//Variables globales d'accès au fichiers
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('MODEL', "model/");
define('VIEW', "view/");
define('CONTROLLER', "controller/");
define('CSS', WEBROOT."src/css/");

//Instanciation de la session
session_start();

//Inclusion de l'autoloader
require_once 'autoloader.php';


//On instancie le routeur
$r = Route::getInstance();

?>
<!DOCTYPE HTML>

<html>

	<head>
		<meta charset='utf-8'>
		<meta author='Cédric Eloundou & Guillaume Fauvet'>

		<!-- INCLUSION  DU CSS -->
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."global.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."formulaire.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."accueil.css'"; ?> >

		<title>Gestion du cabinet médical</title>
	
	</head>

	<body>
		<!-- HEADER DU HAUT-->
		<header>
			<div id='connecBox'>
				<?php
				if(User::isConnected()){
					echo "<span data-action='deconnecter'>".$_SESSION['login']."<span>";
				}
				else {
					echo "<span data-action='connexion'><a href='/gescabmed/accueil/connexion'>Connexion</a></span>";
				}
				?>

			</div>
			<div id='Honglets'>
				<a href=<?php
					echo WEBROOT;
				?>
					><section>Accueil</section></a>
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
					<a href=<?php echo "'".WEBROOT.'consultation/index'."'"; ?>    ><li>Ajouter</li></a>
					<a href=<?php echo "'".WEBROOT.'consultation/afficher'."'"; ?> ><li>Planning</li></a>
				</ul>
				</section>
			</div>
		</header>


		<!-- CONTENU DE LA PAGE -->
		<div id='contenu'>
			<?php
				$r->includeController();
			?>
			
		</div>
	</body>

</html>