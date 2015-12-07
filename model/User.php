<?php

/***********************************************************													 --
**	                      // MODEL \\                     **
**		88        88                                      **
**		88        88                                      **
**		88        88                                      **
**		88        88  ,adPPYba,   ,adPPYba,  8b,dPPYba,   **
**		88        88  I8[    ""  a8P_____88  88P'   "Y8   **
**		88        88   `"Y8ba,   8PP"""""""  88           **
**		Y8a.    .a8P  aa    ]8I  "8b,   ,aa  88           **
**		 `"Y8888Y"'   `"YbbdP"'   `"Ybbd8"'  88           **
**                                                        **
************************************************************/

//Instaciation de la base de données
DataBase::construct();

class User {


	/**
	* Fonction qui connecte l'utilisateur
	* @param le login et 
	* @param le mot de passe indiqué
	* @return vrai si la connexion est réussie, faux sinon */
	static function connecter($login, $mdp){
		$ret = DataBase::$instance->prepare("SELECT * FROM secretariat WHERE login=':login' AND mdp=':mdp';");
		$control = $ret->execute(array(	':login' => $login,
										':mdp'	 => $mdp));
		$res = $ret->fetch();
		if ($res['login'] == $login) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	* Permet de déconnecter l'utilisateur actuellement connecté
	*/
	static function deconnecter(){
		session_destroy();
		session_start();
	}

	/**
	* Teste si l'utilisateur est connecté
	* @return vrai ou faux (simplement)
	*/
	static function isConnected(){
		return isset($_SESSION['login']) && $_SESSION != null;
	}
}

?>