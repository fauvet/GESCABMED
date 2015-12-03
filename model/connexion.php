<?php

/******************************************************************************************************************
--																												 --
**	  ,ad8888ba,                                                                   88                            **
**	 d8"'    `"8b                                                                  ""                            **
**	d8'                                                                                                          **
**	88              ,adPPYba,   8b,dPPYba,   8b,dPPYba,    ,adPPYba,  8b,     ,d8  88   ,adPPYba,   8b,dPPYba,   **
**	88             a8"     "8a  88P'   `"8a  88P'   `"8a  a8P_____88   `Y8, ,8P'   88  a8"     "8a  88P'   `"8a  **
**	Y8,            8b       d8  88       88  88       88  8PP"""""""     )888(     88  8b       d8  88       88  **
**	 Y8a.    .a8P  "8a,   ,a8"  88       88  88       88  "8b,   ,aa   ,d8" "8b,   88  "8a,   ,a8"  88       88  **
**	  `"Y8888Y"'    `"YbbdP"'   88       88  88       88   `"Ybbd8"'  8P'     `Y8  88   `"YbbdP"'   88       88  **
--																												 --
*******************************************************************************************************************/

function connecterUtilisateur($login, $mdp){
	echo isset($bdd);
}

function deconnecterUtilisateur(){
	session_start();
	session_destroy();
}

function isConnected(){
	return isset($_SESSION['login']) && $_SESSION != null;
}

?>