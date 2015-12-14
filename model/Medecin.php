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
		//On selectionne le médecin
		$statement = DataBase::$instance->prepare("SELECT * FROM medecin WHERE id = :id ;");
		$ret = $statement->execute(array(':id' => $id));
		if ($ret == true || $ret == false){
			return false;
		}

		//On teste les valeurs de retour, et on renvoie la réponse
		return $ret->fetch();
	}

	/**
	* Fonction ajoutant un médecin dans la base de données
	* @param son $nom
	* @param son $prénom
	* @return vrai si l'opération s'est bien effectuée, faux sinon
	*/
	static function add($nom, $prenom) {
		$statement = DataBase::$instance->prepare("INSERT INTO medecin(nom, prenom) VALUES (:nom, :prenom);");
		$ret = $statement->execute(array(	':nom'    => $nom,
										':prenom' => $prenom));
		return $ret;
	}


	/**
	* Fonction supprimant le médecin dont l'ID est passé en paramètres
	* @param son $ID
	*/
	static function delete($id){
		if (self::exists($id)){
			$statement = DataBase::$instance->prepare("DELETE FROM medecin WHERE id = :id ;");
			$ret = $statement->execute(array(':id' => $id));
			print_r($statement);
			return $ret;
		}
		else {return false;}
	}


	/**
	* Fonction modifiant comme indiqué le nom et le prénom du médecin dont l'ID est passé en paramètres
	* @param son $ID
	* @param son $nom
	* @param son $prénom
	* @return vrai si l'opération s'est correctement effectuée, faux sinon
	*/
	static function modify($id, $nom, $prenom){
		$statement = DataBase::$instance->prepare("UPDATE medecin SET nom=':nom',prenom=':prenom' WHERE id=:id");
		$ret = $statement->execute(array(	':nom'    => $nom,
											':prenom' => $prenom,
											':id'	  => $id));
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
		$ret = DataBase::$instance->query("SELECT * FROM medecin;");
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
		$ret = DataBase::$instance->query("SELECT nom, prenom FROM medecin WHERE id=".$id.";");
		//Si aucun résultat n'est retrouvé on renvoie faux
		if(!isset($ret) || $ret == array())
			return false;
		return $ret->fetch();
	}
}


?>