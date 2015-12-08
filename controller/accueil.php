<?php

/********************************************************************************
**	                             :: CONTROLLER ::                              **
**	       db                                                         88  88   **
**	      d88b                                                        ""  88   **
**	     d8'`8b                                                           88   **
**	    d8'  `8b      ,adPPYba,   ,adPPYba,  88       88   ,adPPYba,  88  88   **
**	   d8YaaaaY8b    a8"     ""  a8"     ""  88       88  a8P_____88  88  88   **
**	  d8""""""""8b   8b          8b          88       88  8PP"""""""  88  88   **
**	 d8'        `8b  "8a,   ,aa  "8a,   ,aa  "8a,   ,a88  "8b,   ,aa  88  88   **
**	d8'          `8b  `"Ybbd8"'   `"Ybbd8"'   `"YbbdP'Y8   `"Ybbd8"'  88  88   **
**	                                                                           ** 
*********************************************************************************/

function index($params = null){
	include VIEW."accueilIndex.php";
}


function connexion(){
	if (!User::isConnected()) {
		//Inclusion de la vue
		include VIEW."connexion.php";
		
		//S'il y a eu POST
		if (isset($_POST['login']) && isset($_POST['psw'])){
			//Définition des logs et mdp
			$login = htmlspecialchars(trim($_POST['login']));
			$psw = htmlspecialchars(trim($_POST['psw']));

			//Execution de la fonction du model
			$ret = User::connecter($login, $psw);
			if ($ret) {
				$_SESSION['login'] = $login;
				echo "Vous êtes à présent connecté.";
			}
			else {
				echo "<p id='error'>Mot de passe ou login erroné</p>";
			}
		}
	}
	else {
		index();
	}
}


function deconnexion(){
	//Deconnexion
	User::deconnecter();
	//Redirection sur l'index
	index();
}

?>