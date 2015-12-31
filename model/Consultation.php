<?php


/*******************************************************************************************************************************************************
*                                                                                                                                                      *
*   ,ad8888ba,    ,ad8888ba,    888b      88   ad88888ba   88        88  88      888888888888     db    888888888888  88    ,ad8888ba,    888b     88  *
*  d8"'     "8b  d8"'     "8b   8888b     88  d8"     "8b  88        88  88           88         d88b        88       88   d8"'     "8b   8888b    88  *
* d8'           d8'         8b  88 8b    88   Y8,          88        88  88           88        d8'8b        88       88  d8'         8b  88 8b    88  *
* 88            88          88  88  8b   88   Y8aaaaa,     88        88  88           88       d8'  8b       88       88  88          88  88  8b   88  *
* 88            88          88  88   8b  88      """""8b,  88        88  88           88      d8YaaaaY8b     88       88  88          88  88   8b  88  *
* Y8,           Y8,        ,8P  88    8b 88            8b  88        88  88           88     d8""""""""8b    88       88  Y8,        ,8P  88    8b 88  *
*  Y8a.    .a8P  Y8a.    .a8P   88     8888   Y8a     a8P   Y8a.   .a8P  88           88    d8'         8b   88       88   Y8a.    .a8P   88     8888  *
*   "Y8888Y"'    "Y8888Y"'      88      888    "Y88888P"     "Y8888Y"'   88888888888  88   d8'           8b  88       88    "Y8888Y"'     88      888  *
*                                                                                                                                                      *
********************************************************************************************************************************************************/



DataBase::construct();

class Consultation {

	static function sommeDesHeuresParMedecin() {
			$ret = DataBase::$instance->query("SELECT nom, prenom, civilite, SUM(duree) AS total FROM rdv, medecin WHERE medecin.id = rdv.id_medecin GROUP BY id_medecin ORDER BY total DESC;");
			return $ret->fetchAll();
		}

	static function add($date, $idPatient, $idMedecin, $heure, $duree){
		$statement = DataBase::$instance->prepare("INSERT INTO rdv(date, id_patient, id_medecin, heure_debut, duree)
			VALUES ( :date , :idP , :idM , :h , :d );");
		$ret = $statement->execute(array(':date' => $date,
			                             ':idP'  => $idPatient,
			                             ':idM'  => $idMedecin,
			                             ':h'    => $heure,
			                             ':d'    => $duree));
		return $ret;
	}

	static function selectAll($dateDebut=null, $dateFin=null){
		//Si la date de début n'est pas indiquée on prend la date du jour
		if ($dateDebut == null) {$dateDebut = date('Y-m-d');}
		//De meme pour la date de fin
		$suiteRequete = (($dateFin == null )?" ":" AND date <= :dateFin ");

		//Traitement de la requete SQL
		$statement = DataBase::$instance->prepare("SELECT * FROM rdv WHERE date >= :dateDebut".$suiteRequete."ORDER BY date;");
		$statement->bindParam(':dateDebut', $dateDebut);
		//S'il n'y a pas de date de fin alors on en met pas (logique)
		if ($dateFin != null) {
			$statement->bindParam(':dateFin', $dateFin);
		}
		$ret = $statement->execute();
		if (!$ret) {return false;}
		return $statement->fetchAll();
	}

	static function selectByWeek($numSem, $dateLundi) {
		$statement = DataBase::$instance->prepare("SELECT * FROM rdv WHERE WEEK(date) = :numSem AND date >= DATE( :lundi ) ORDER BY date, heure_debut;");
		$ret = $statement->execute(array(':numSem' => $numSem,
			                             ':lundi'  => $dateLundi));
		print_r($statement);
		echo "<br>".$numSem."<br>".$dateLundi."<br>";
		//return $ret->fetchAll();
	}

}

?>