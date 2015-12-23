<?php

function index(){

}

function graphe(){
	$donnees = array();
	$donnees['nbH25'] = Statistiques::nbHommeMoins25ans();
	$donnees['nbF25'] = Statistiques::nbFemmeMoins25ans();
	$donnees['nbH25a50'] = Statistiques::nbHommeEntre25Et50ans();
	$donnees['nbF25a50'] = Statistiques::nbFemmeEntre25Et50ans();
	$donnees['nbH50'] = Statistiques::nbHommePlus50ans();
	$donnees['nbF50'] = Statistiques::nbFemmePlus50ans();

	include VIEW."grapheStats.php";
}

function comparateur(){
	$horaires = Consultation::sommeDesHeuresParMedecin();

	include VIEW."comparateur.php";
}

?>