<?php

/*
	                                                                                             		
	        "8a           88888888ba                                                             		   
	          "8a         88      "8b                             ,d                             		   
	8888888888  "8a       88      ,8P                             88                                           
	              "8a     88aaaaaa8P'  ,adPPYba,   88       88  MM88MMM  ,adPPYba,  88       88  8b,dPPYba, 
	8888888888    a8"     88""""88'   a8"     "8a  88       88    88    a8P_____88  88       88  88P'   "Y8 
	            a8"       88    `8b   8b       d8  88       88    88    8PP"""""""  88       88  88         
	          a8"         88     `8b  "8a,   ,a8"  "8a,   ,a88    88,   "8b,   ,aa  "8a,   ,a88  88         
	        a8"           88      `8b  `"YbbdP"'    `"YbbdP'Y8    "Y888  `"Ybbd8"'   `"YbbdP'Y8  88         
	                                                                                
*/


class Route {

	/**===========================================================================
	*						ATTRIBUS DU ROUTEUR	    ==
	*-----------------------------------------------------------------------------
	* ==> Classe basée sur le design pattern singleton			    ==
	*									    ==
	* -> @controller le controller selectionné par l'URL 			    ==
	* -> @action la fonction (ou action) correspondante dans le controller	    ==
	*		(peut être nulle -> index) 				    ==
	* -> @params les paramètres entrés pour la fonction correspondante	    ==
	============================================================================*/

	public $controller;
	public $action;
	public $params = array();
	private static $instance = null;


		/*********************
		***  CONSTRUCTEUR  ***
		**********************/
	private function __construct(){

		//On récupère dans un tableau toutes les données passées dans l'URL 
		$url = explode('/', substr($_SERVER['REQUEST_URI'], 1));

		//On récupère le controller, s'il est null on le met à index.php
		$this->controller = (($url[1] == '') ? 'accueil' : $url[1]);

		//On récupère l'action...
		if(isset($url[2])) {
			$this->action = $url[2];
			// et les paramètres si définis
			for ($i = 3; isset($url[$i]) && $url[$i] != ''; $i++) {
				$this->params[$i - 3] = $url[$i];
			}
		} else {
			$this->action = 'index';
		}
	}


		/*********************
		***  GET INSTANCE  ***
		**********************/
	public static function getInstance() {
		if (Route::$instance == null) {
			Route::$instance = new Route();
		}
		return Route::$instance;
	}

		/*****************************
		***  INCLUSION DE LA PAGE  ***
		******************************/
	public function includeController() {
		//Inclusion du controller correspondant
		$cont = CONTROLLER.$this->controller.'.php';
		try {
			require $cont;
			//appel de la fonction correspondante
			if (!function_exists($this->action)) {
				throw new Exception("Router error", 1);
			}
			call_user_func_array($this->action, $this->params);
		}
		catch(Exception $e) {
				include VIEW."404.php";
		}
	}

		/****************************
		***  INCLUSION DU HEADER  ***
		*****************************/
	public function includeHeader() {
		if (User::isConnected()) {
			include VIEW."headerConnecte.php";
		}
		else {
			include VIEW."headerDeconnecte.php";
		}
	}

		/****************************
		***  INCLUSION DU HEADER  ***
		*****************************/
	public function refreshConnection(){
		//S'il y a eu POST (et donc tentative de connexion)
		if (isset($_POST['login']) && isset($_POST['psw'])){
			//Définition des logs et mdp
			$login = htmlspecialchars(trim($_POST['login']));
			$psw = htmlspecialchars(trim($_POST['psw']));

			//Execution de la fonction du model
			$ret = User::connecter($login, $psw);
			if ($ret) {
				$_SESSION['login'] = $login;
			}
		}
		//S'il n'y a pas eu post et que l'utilisateur tente de se déconnecter
		if($this->controller == 'accueil' && $this->action == 'deconnexion'){
			User::deconnecter();
		}
	}
}
		

?>

