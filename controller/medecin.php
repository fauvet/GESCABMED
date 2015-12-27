<?php



function ajouter(){
	//Inclusion de la vue
	include VIEW."ajoutMedecin.php";

	//S'il y a eu post
	if (isset($_POST['posted'])) {

		//SI tous les champs ont été remplis
		if ($_POST['nom'] != '' && $_POST['prenom'] != '' && $_POST['civilite'] != '') {
			$nom    = $_POST['nom'];	
			$prenom = $_POST['prenom'];
			$civilite = $_POST['civilite'];
			$ret = Medecin::add($nom, $prenom, $civilite);

			//On renvoie le résultat à l'écran
			if ($ret) {
				echo "<p id='messageOK'>Médecin enregistré(e)</p>";
			}
			else {
				echo "<p id='mErreur'>Erreur : Veuillez contacter votre administrateur.</p>";
			}
		}
		else {
			echo "<p id='mErreur'>Veuillez remplir correctement tous les champs.</p>";
		}
	}
}

function lister(){
	//S'il y a eu post
	if (isset($_POST) && $_POST !== array()) {
		$retour = true;
		foreach ($_POST as $Mid => $key) {
			$id = substr($Mid, 1);
			$retour = Medecin::delete($id) && $retour;
		}
	}

	//On récupère la liste des médecins travaillant au cabinet
	$medecins = Medecin::selectAll();

	//On inclu la vue
	include VIEW."listerMedecin.php";

	//On affiche le message de confirmation s'il y a eu suppression
	if (isset($retour)){
		if($retour){
		echo "<p id='messageOK'>Supprimé(s)<p>";
		}
		else {
			echo "<p id='mErreur'>Erreur interne<p>";
		}
	}
}

function profil($id){
	//On teste que le paramètre de l'URL est bien un ID valide de médecin
	if (($id != null && $id == intval($id)) && Medecin::exists($id)) {
		//Traitement du POST
		if(isset($_POST['posted'])){
			$Mnom      = $_POST['nom'];	
			$Mprenom   = $_POST['prenom'];
			$Mcivilite = $_POST['civilite'];
			echo $Mnom.$Mprenom;
			$retour = Medecin::update($id, $Mnom, $Mprenom, $Mcivilite);
		}

		//Récupération des données pour la vue
		$medecin = Medecin::selectByID($id);
		include VIEW.'modifierMedecin.php';

		//Tratiement du retour de la fonction update
		if(isset($retour) && $retour){
			echo "<p id='messageOK'>Modifications effetuées</p>";
		}
		elseif(isset($retour) && $retour){
			echo "<p id='mErreur'>Erreur : Veuillez contacter votre administrateur.</p>";
		}
	}
	else{
		unset($_POST); //Supprimer le post pour éviter les conflits avec l'autre page
		lister();
		echo "<p id='mErreur'>Aucun médecin correspondant<p>";
	}
}

?>