<?php

/***************************************************												 --
**	                 // MODEL \\                  **

**                                                **
*****************************************************/

//Instaciation de la base de données
DataBase::construct();


function index(){
	//On reccupère les medecins et les patients utilisés dans la vue
	$tabMedecin = Medecin::selectAll();
	$tabPatient = Patient::selectAll();
	include VIEW."ajoutConsultations.php";

	//Traitement du post
	if (isset($_POST) && $_POST !== array()) {
		if ($_POST['medecin'] == 'Aucun' || $_POST['patient'] == 'Aucun' || $_POST['date'] == '' || $_POST['heure'] == '') {
			echo "<p id='mErreur'>Veuillez remplir correctement tous les champs.</p>";
		}
		elseif ($_POST['duree'] <= 0) {
			echo "<p id='mErreur'>Veuillez saisir une durée valide</p>";
		}
		//On effectue l'ajout dans la base de données
		else {
			if(Consultation::add()){
				echo "<p class='messageOK'>Enregistré !</p>";
			}
			else{
				echo "<p id='mErreur'>Erreur interne</p>";
			}
		}
	}
}

	
function afficher($numSem=null){
	//On détermine le numéro de la semaine actuelle, et les jours.
	$numSem = date('W');
	$infoSemaine = array('lun'  => date('d/m'),
		                 'mar'  => date('d/m'),
		                 'mer'  => date('d/m'),
		                 'jeu'  => date('d/m'),
		                 'ven'  => date('d/m'),
		                 'sam'  => date('d/m'));  
	include VIEW."afficheConsultations.php";
}


?>