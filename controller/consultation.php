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
	$jSem = array('Lundi ', 'Mardi ', 'Mercredi ', 'Jeudi ', 'Vendredi ', 'Samedi ');
	for ($i=0; $i < 6; $i++) {
		$jSem[$i] .= date("Y-m-d", time() + ((24*60*60)*($i+1-$numJour)+($numSem - date('W'))*7*24*60*60));
	}
	//On récuppère les consultations sur la semaine en cours
	$rdvs = Consultation::selectAll(str_replace("Lundi ", '', $jSem[0]), str_replace("Samedi ", '', $jSem[5]));
	print_r($rdvs);
	include VIEW."afficheConsultations.php";
}


?>