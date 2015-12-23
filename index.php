<?php
/*********************************************
****	GESTION GLOBALE PHP DU SITE		*****
*********************************************/

//Variables globales d'accès au fichiers
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('MODEL', "model/");
define('VIEW', "view/");
define('CONTROLLER', "controller/");
define('CSS', WEBROOT."src/css/");
define('JS', WEBROOT."src/js/");
define('IMG', WEBROOT."src/img/");
//Instanciation de la session
session_start();

//Inclusion de l'autoloader
require_once 'autoloader.php';


//On instancie le routeur
$r = Route::getInstance();

//Si l'utilisateur vient de se connecter ou de se déconnecter on rafraichi l'état de connexion
$r->refreshConnection();

?>
<!DOCTYPE HTML>

<html>

	<head>
		<meta charset='utf-8'>
		<meta author='Cédric Eloundou & Guillaume Fauvet'>
		<link rel="icon" href=<?php echo "'".IMG."site.ico'"; ?> />

		<!-- INCLUSION  DU CSS -->
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."global.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."formulaire.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."accueil.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."tableau.css'"; ?> >
		<link rel="stylesheet" type="text/css" href=<?php echo "'".CSS."consultations.css'"; ?> >


		<title>Gestion du cabinet médical</title>
	
	</head>

	<body>
		<!-- HEADER DU HAUT -->
		<?php
			$r->includeHeader();
		?>


		<!-- CONTENU DE LA PAGE -->
		<div id='contenu'>
			<?php
			if (User::isConnected()) {
				$r->includeController();
			}
			else {
				// On redirrige tout vers la page de connexion si l'utilisateur n'est aps connecté
				$r->controller = 'accueil';
				$r->action = 'connexion';
				$r->params = array();
				$r->includeController();
			}
			?>
			
		</div>
		
		<!--INCLUSION DU JAVASCRIPT-->
		<!--script type="text/javascript" src=<?php //echo JS."ajoutPatient.js"; ?>></script-->

	</body>

</html>
