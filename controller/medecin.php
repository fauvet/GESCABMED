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
			echo "<p>Veuillez remplir correctement tous les champs.</p>";
		}
	}
}

?>