<?php



function ajouter(){
	//Inclusion de la vue
	include VIEW."ajoutMedecin.php";

	//S'il y a eu post
	if (isset($_POST['posted'])) {

		//SI tous les champs ont été remplis
		if ($_POST['nom'] != '' && $_POST['prenom'] != '') {
			$nom    = $_POST['nom'];	
			$prenom = $_POST['prenom'];
			$ret = Medecin::add($nom, $prenom);

			//On renvoie le résultat à l'écran
			if ($ret) {
				echo "Médecin enregistré(e)";
			}
			else {
				echo "Erreur : Veuillez contacter votre administrateur.";
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
		foreach ($_POST as $Mid => $key) {
			$id = substr($Mid, 1);
			echo $id.' ';
			if (Medecin::delete($id)){
				echo "SUPPRESSION EFFECTUEE";
			}
			else {
				echo "c'est cassé";
			}
		}
	}

	//On récupère la liste des médecins travaillant au cabinet
	$medecins = Medecin::selectAll();

	//On inclu la vue
	include VIEW."listerMedecin.php";
}

?>