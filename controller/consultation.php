<?php

/***************************************************												 --
**	                 // MODEL \\                  **

**                                                **
*****************************************************/


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
		elseif (strcmp($_POST['date'], date("Y-m-d")) < 0 || (strcmp($_POST['date'], date("Y-m-d")) == 0 && strcmp($_POST['heure'], date("G:i")) < 0) ) {
			echo "<p id='mErreur'>La date du rendez-vous est déjà dépassée</p>";
		}
		//On effectue l'ajout dans la base de données
		else {
			$date      = $_POST['date'];
			$idPatient = $_POST['patient'];
			$idMedecin = $_POST['medecin'];
			$heure     = $_POST['heure'];
			$duree     = $_POST['duree'];
			//On vérifie que le médecin selectionné n'a pas de RDV au créneau indiqué
			if(Medecin::isAvailable($idMedecin, $date, $heure, $duree)){
				if(Consultation::add($date, $idPatient, $idMedecin, $heure, $duree)){
					echo "<p id='messageOK'>Enregistré!</p>";
				}
				else{
					echo "<p id='mErreur'>Erreur interne</p>";
				}
			}
			else{
				echo "<p id='mErreur'>Ce médecin est déjà en consultation à cette heure</p>";
			}
		}
	}
}

	
function afficher($numSem=null){
	//On détermine le numéro de la semaine actuelle, et la date des jours.
	if($numSem == null || $numSem < 1 || $numSem > 53){$numSem = date('W');}
	$semPre = ($numSem==1)? 53 : $numSem-1;
	$semSui = ($numSem==53)? 1 : $numSem+1;
	$numJour = date('w');
	//Préparation du tableau "agenda" de la semaine
	$agenda = array(array('j' => 'Lundi '),
		          array('j' => 'Mardi '),
		          array('j' => 'Mercredi '),
	              array('j' => 'Jeudi '),
	              array('j' => 'Vendredi '),
	              array('j' => 'Samedi '));
	//On récuppère les consultations sur la semaine en cours
	for ($i=0; $i < 6; $i++) {
		//On récupère la date du jour en cours
		$date = date("Y-m-d", time() + ((24*60*60)*($i+1-$numJour)+($numSem - date('W'))*7*24*60*60));
		$agenda[$i]['j'] .= $date;
		//on ajoute chaque consuultation à chaque heure donnée
		$rdvs = Consultation::selectAll($date, $date);
		foreach ($rdvs as $rdv) {
			$h = substr($rdv['heure_debut'], 0, 2);
			$agenda[$i][$h][$rdv['id']] = $rdv;
			//On récupère les médecins et les patients
			$med = Medecin::selectByID($rdv['id_medecin']);
			$agenda[$i][$h][$rdv['id']]['medecin'] = substr(($med['prenom']), 0, 1).". ".$med['nom'];
			$pat = Patient::select($rdv['id_patient']);
			$agenda[$i][$h][$rdv['id']]['patient'] = substr(($pat['prenom']), 0, 1).". ".$pat['nom'];
		}
	}
	//Inclusion de la vue
	include VIEW."afficheConsultations.php";
}

function profil($id){
	//On vérifie que le paramètre est bien un ID
	if (($id != null && $id == intval($id)) && Consultation::exists($id)) {
		//Gestion du POST
		if (isset($_POST['posted'])) {
			
		}
		//Inclusion de la page
		$rdv = Consultation::select($id);
		$tabMedecin = Medecin::selectAll();
		$tabPatient = Patient::selectAll();
		$pConsult = Patient::select($rdv['id_patient']);
		$mConsult = Medecin::selectByID($rdv['id_medecin']);
		include VIEW.'modifierConsultation.php';
	}
	else{
		unset($_POST); //Supprimer le post pour éviter les conflits avec l'autre page
		afficher();
		echo "<p id='mErreur'>Aucune consultation correspondante<p>";
	}
}


?>