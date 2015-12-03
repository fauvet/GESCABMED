<?php

/*******************************
**   CONTROLLER DE L'ACCUEIL  ** 
********************************/

//inclusion des models necessaires
require_once MODEL."connexion.php";

function index($params = null){
	
}


function connexion(){
	if ( ! isConnected()) {
		include VIEW."connexion.php";
		connecterUtilisateur('non','oui');
	}
	else {
		echo "<script>alert('Vous êtes déjà connecté');</script>"
	}
}


function deconnexion(){
	
}

?>