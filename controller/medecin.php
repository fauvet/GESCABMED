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
				echo "Enregistré !";
			}
			else {
				echo "Erreur interne";
			}
		}
		else {
			echo "Veuillez remplir tous les champs (en plus c'est pas dur ici...)";
		}
	}
}

?>