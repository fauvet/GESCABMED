<?php
/*********************************************
****	GESTION GLOBALE PHP DU SITE		*****
*********************************************/

//Variables globales d'accès au fichiers
define('WEBROOT', str_replace('index.php', '', substr($_SERVER['SCRIPT_NAME'],1)));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('MODEL', WEBROOT."model/");
define('VIEW', WEBROOT."view/");
define('CONTROLLER', WEBROOT."controller/");
define('CSS', WEBROOT."src/css/");

//Instanciation de la session
session_start();

//Connexion à la base de bdd
$dsn = 'mysql:dbname=gescabmed;host=localhost';
$user = 'root';
$pdw = '';
$bdd = new PDO($dsn, $user, $pdw);

//Inclusion des fichiers
require_once 'route.php';


//On instancie le routeur
$r = Route::getInstance();

?>
<!DOCTYPE HTML>

<html>

	<head>
		<meta charset='utf-8'>
		<meta author='Cédric Eloundou & Guillaume Fauvet'>

		<!-- INCLUSION  DU CSS -->
		<link rel="stylesheet" type="text/css" href=<?php echo "'/".CSS."global.css'"; ?> >

		<title>Gestion du cabinet médical</title>
	
	</head>

	<body>
		<!-- HEADER DU HAUT-->
		<header>
			<div id='connecBox'>
				<?php
				if(isset($_SESSION['login'])){
					echo "<span data-action='deconnecter'>".$_SESSION['login']."<span>";
				}
				else {
					echo "<span data-action='connexion'>Connexion</span>";
				}
				?>

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