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
	if (! User::isConnected()){
		include VIEW."connexion.php";
		if(isset($_POST['login'])){
			echo "<p id='mErreur'>Mot de passe ou login erroné</p>";
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
	connexion();
}

?>