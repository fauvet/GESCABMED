<?php

/******************************************************************************************
**	                                    // MODEL \\                                      **
**	88b           d88                       88                          88               **
**	888b         d888                       88                          ""               **
**	88`8b       d8'88                       88                                           **
**	88 `8b     d8' 88   ,adPPYba,   ,adPPYb,88   ,adPPYba,   ,adPPYba,  88  8b,dPPYba,   **
**	88  `8b   d8'  88  a8P_____88  a8"    `Y88  a8P_____88  a8"     ""  88  88P'   `"8a  **
**	88   `8b d8'   88  8PP"""""""  8b       88  8PP"""""""  8b          88  88       88  **
**	88    `888'    88  "8b,   ,aa  "8a,   ,d88  "8b,   ,aa  "8a,   ,aa  88  88       88  **
**	88     `8'     88   `"Ybbd8"'   `"8bbdP"Y8   `"Ybbd8"'   `"Ybbd8"'  88  88       88  **
**	                                                                                     **  
*******************************************************************************************/

//Instaciation de la base de données
DataBase::construct();

class Medecin {
	
	/**
	* Fonction qui teste dans la base de données l'existance du médecin dont l'ID est apssé en paramètres
	* @param l' $ID du médecin recherché
	* @return vrai si l'ID est retrouvé, faux sinon
	*/
	static function exists($id) {
		$ret = DataBase::$instance->query("SELECT * FROM medecin WHERE id =".$id.";");
		$medecin = $ret->fetch();
		return ($medecin['id'] == $id);
	}

	/**
	* Fonction ajoutant un médecin dans la base de données
	* @param son $nom
	* @param son $prénom
	* @return vrai si l'opération s'est bien effectuée, faux sinon
	*/
	static function add($nom, $prenom, $civilite) {
		$statement = DataBase::$instance->prepare("INSERT INTO medecin(nom, prenom, civilite) VALUES (:nom, :prenom, :civilite);");
		$ret = $statement->execute(array(':nom'    => $nom,
										':prenom' => $prenom,
										':civilite' =>$civilite));
		return $ret;
	}


	/**
	* Fonction supprimant le médecin dont l'ID est passé en paramètres
	* @param son $ID
	*/
	static function delete($id){
		$statement = Database::$instance->prepare("UPDATE patient SET id_med = NULL WHERE id_med = :id;");
		$ret = $statement->execute(array(`:id` => $id));
		if ($ret) {
			$statement = DataBase::$instance->prepare("DELETE FROM medecin WHERE id = :id ;");
			$ret = $statement->execute(array(':id' => $id));
		}
		return $ret;
	}


	/**
	* Fonction retournant l'ID correspodant aux médecins avec pour paramètres d'entrée
	* @param leur $nom
	* @param leur $prénom
	* @return un array des IDs des médecins, un array vide si pas de résultat ou false si les 2 paramètres sont nulls
	* ---------------------------------------------------------------------------------------------------------------
	* ====> L'utilité de cette fonction est encore à prévoir... mais bon on sait jamais :)
	*/
	static function getID($nom=null, $prenom=null){
		//On vérifie que les deux paramètres ne sont pas nuls deux à deux
		if ($nom != null && $prenom != null) {

			//On instancie les variables locales
			$sql = "SELECT id FROM medecin WHERE ";
			$tabExec = array();

			//Si on a pas tous les paramètres
			if($nom != null){
				$sql = $sql."nom = ':nom' ";
				$tabExec[':nom'] = $nom;
			}
			if ($prenom != null) {
				$sql = $sql."prenom = ':prenom' ";
				$tabExec[':prenom'] = $prenom;
			}

			$statement = DataBase::$instance->prepare($sql);
			$ret = $statement->execute($tabExec);
			$medecinsID = $ret->fetchAll();
			return $medecinsID;
		}
		else {
			return false;
		}
	}

	/**
	* Selectionne tous les médecins enregistrés dans la base de données
	* @return un array contenant l'ensemble des données relatives aux médecins
	*/
	static function selectAll(){
		$ret = DataBase::$instance->query("SELECT * FROM medecin ORDER BY nom, prenom, civilite;");
		return $ret->fetchAll();
	}

	/**
	* Selectionne le médecin dans la base de données dont l'ID est en paramètre
	* @param ID du médecin à rechercher
	* @return un array contenant le nom et prénom du médecin, ou false si rien est trouvé
	*/
	static function selectByID($id){
		//Si aucun ID est renseigné on renvoie faux
		if(!isset($id) || $id == '')
			return false;
		$ret = DataBase::$instance->query("SELECT * FROM medecin WHERE id=".$id.";");
		//Si aucun résultat n'est retrouvé on renvoie faux
		if(!isset($ret) || $ret == array())
			return false;
		return $ret->fetch();
	}

	/**
	* Met à jour les informations du médecin correspondant dans la base de données 
	* @param ID du médecin que l'on modifie
	* @param nom que l'on lui attribu de nouveau
	* @param prenom que l'on lui attribu de nouveau
	* @param civilité que l'on lui attribu de nouveau
	* @return vrai si la modification s'est bien effectuée, false sinon
	*/
	static function update($id, $nom, $prenom, $civilite){
		$statement = DataBase::$instance->prepare("UPDATE medecin SET nom= :nom ,prenom= :prenom , civilite= :civ WHERE id = :id ;");
		$ret = $statement->execute(array(':id'     => $id,
			                             ':nom'    => $nom,
			                             ':prenom' => $prenom,
			                             ':civ'    => $civilite));
		return $ret;
	}

	static function isAvailable($id_med, $date, $heure, $duree){
		//On split l'heure pour l'exploiter
		$hmsDebut = explode(':', $heure);
		//On récupère l'heure de fin prévue pour la consultation
		$hmsFin = explode(':', $heure);
		while($duree >= 60) {
				$hmsFin[0] += 1;
				$duree -= 60;
		}
		if($duree < 60){$hmsFin[1] += $duree;}

		//On sélectionne les rdv du médecin pour le jour donné, et qui commence avant la fin du RDV a ajouter
		$statement = DataBase::$instance->prepare("SELECT * FROM rdv WHERE DATE(date) = DATE( :date ) AND  id_medecin = :idmed AND heure_debut < CAST( :heure AS time);");
		//Préparation des variables (ajout des guillemets)
		$h = $hmsFin[0].":".$hmsFin[1].":00";
		$date = $date;
		$ret = $statement->execute(array( ':date' => $date, ':heure' => $h, ':idmed' => $id_med));
		if(!$ret){
			return false;
		}

		$rdvs = $statement->fetchAll();
		//On teste que les RDV ne sont pas en conflit
		foreach ($rdvs as $rdv) {
			$hms = explode(':', $rdv['heure_debut']);
			$d = $rdv['duree'];
			while($d >= 60) {
					$hms[0] += 1;
					$d -= 60;
			}
			if($d < 60){$hms[1] += $d;}
			//On vérifie que la date de fin du rdv n'est pas supèrieure à la date de début du RDV a ajouter
			if($hms[0]>$hmsDebut[0] || ($hms[0] == $hmsDebut[0] && $hms[1] > $hmsDebut[1])){
				return false;
			}
		}
		//Si on tout est bon, pas de conflit
		return true;
	}
}


?>