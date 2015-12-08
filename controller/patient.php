<?php

/****************************************************************************
**                             :: CONTROLLER ::                            **
**	                           ----------------                            **
**	88888888ba                        88                                   **
**	88      "8b                ,d     ""                            ,d     **
**	88      ,8P                88                                   88     **
**	88aaaaaa8P'  ,adPPYYba,  MM88MMM  88   ,adPPYba,  8b,dPPYba,  MM88MMM  **
**	88""""""'     ""     Y8    88     88  a8P_____88  88P'    "8a   88     **
**	88           ,adPPPPP88    88     88  8PP"""""""  88       88   88     **
**	88           88,    ,88    88,    88  "8b,   ,aa  88       88   88,    **
**	88           "8bbdP"Y8    "Y888  88    "Ybbd8"'   88       88   "Y888  **
**	                                                                       **
*****************************************************************************/


function index(){

}


function supprimer($id){

}

function ajouter(){
	//On inclu la vue correspondante. Pour cela on a besoin de récupérer la liste des médecins
	$tabMedecin = array();
	$tabMedecin = Medecin::selectAll();
	include VIEW."ajoutPatient.php";

	//On teste s'il y a eu post ou pas
	if(isset($_POST['posted'])){
		//On stock toutes les données dans un tableau 
		$dataPOST = array('Pcivilite' => $_POST['civilite'],
						  'Pnom'      => $_POST['nom'],
						  'Pprenom'   => $_POST['prenom'],
						  'Pdn'       => $_POST['date_naissance'],
						  'Pln'       => $_POST['lieu_naissance'],
						  'Pns'       => $_POST['num_secu'],
						  'Padresse'  => $_POST['adresse'],
						  'Pcp'       => $_POST['cp'],
						  'Pville'    => $_POST['ville']);

		//On véréfie que toutes les données on été postées et sont correctes
		$postOK = true;
		foreach ($dataPOST as $key) {
			// Si il y a une valeur non renseignée...
			if(!isset($key) || $key == null || $key == ''){
				$postOK = false;
				break;
			}
		}

		//Si toutes les varaibles sont OK alors on exécute la fonction add() du model Patient ...
		if ($postOK) {
			extract($dataPOST);
			unset($dataPOST);
			$Pmed = ($_POST['medecin'] == 'Aucun')? "NULL" : $_POST['medecin'];
			$ret = Patient::add($Pcivilite, $Pnom, $Pprenom, $Pdn, $Pln, $Pns, $Padresse, $Pcp, $Pville, $Pmed);
			//On affiche un message sur la page selon le résultat
			if ($ret) {
				echo "<p>Patient(e) enregistré(e)</p>";
			}
			else {
				echo "<p>Erreur : Veuillez contacter votre administrateur.</p>";
			}
		}
		//... Sinon on envoie un message d'erreur
		else {
			echo "<p>Veuillez remplir correctement tous les champs.</p>";
		}
	}
}

function profil($id){

}

?>