<?php
	/****************************************************************************
	**                                // MODEL \\                              **
	**	88888888ba                        88                                   **
	**	88      "8b                ,d     ""                            ,d     **
	**	88      ,8P                88                                   88     **
	**	88aaaaaa8P'  ,adPPYYba,  MM88MMM  88   ,adPPYba,  8b,dPPYba,  MM88MMM  **
	**	88""""""'     ""     Y8    88     88  a8P_____88  88P'    "8a   88     **
	**	88           ,adPPPPP88    88     88  8PP"""""""  88       88   88     **
	**	88           88,    ,88    88,    88  "8b,   ,aa  88       88   88,    **
	**	88           "8bbdP"Y8    "Y888  88    "Ybbd8"'   88       88   "Y888  **
	**	                                                                       **
	*****************************************************************************/

	//Instaciation de la base de données
	DataBase::construct();

	class Patient {

		static function add($civilite, $nom, $prenom, $date_naissance, $lieu_naissance, $num_secu, $adresse, $cp, $ville, $id_med){
			$ok = true;
			$ok = $ok && (strlen(str_replace(" ", "", $num_secu)) == 15);
			$ok = $ok && (strlen($cp) == 5);
			if ($ok)	{
				$statement = DataBase::$instance->prepare(
					"INSERT INTO patient(civilite, nom, prenom, date_naissance, lieu_naissance, num_secu, adresse, cp, ville, id_med)
					VALUES (:civilite, :nom, :prenom, :date_naissance, :lieu_naissance, :num_secu, :adresse, :cp, :ville, :id_med )
					WHERE CURDATE() > :date_naissance;" );

				$ret = $statement->execute(array(':civilite'       => $civilite,
												 ':nom'            => $nom,
												 ':prenom'         => $prenom,
												 ':date_naissance' => $date_naissance,
												 ':lieu_naissance' => $lieu_naissance,
												 ':num_secu'       => $num_secu,
												 ':adresse'        => $adresse,
												 ':cp'             => $cp,
												 ':ville'          => $ville,
												 ':id_med'         => $id_med));
				return $ret;
			} else {
				return false;
			}
		}

		static function exists($id){
			//On selectionne le médecin
			$statement = DataBase::$instance->query("SELECT * FROM patient WHERE id = ".$id.";");
			$patient = $statement->fetch();
			return ($patient['id'] == $id);
			
		}

		static function delete($id){
			if (self::exist($id)){
				$statement = DataBase::$instance->prepare("DELETE FROM patient WHERE id = :id");
				$ret = $statement->exec(array(':id' => $id));
				return $ret;
			}
			else {return false;}
		}

		static function selectAll(){
			$ret = DataBase::$instance->query("SELECT * FROM patient ORDER BY nom;");
			return $ret->fetchAll();
		}

		static function select($id){
			$ret = DataBase::$instance->query("SELECT * FROM patient WHERE id = ".$id.";");
			return $ret->fetch();
		}

		static function update($id, $civilite, $nom, $prenom, $date_naissance, $lieu_naissance, $num_secu, $adresse, $cp, $ville, $id_med){
			$statement = DataBase::$instance->prepare("UPDATE patient SET civilite = :civ ,nom = :nom ,prenom = :prenom ,date_naissance = :dn ,lieu_naissance = :ln ,"
				."num_secu = :ns ,adresse = :adr ,cp = :cp ,ville = :ville WHERE id = :id ;");
			$ret = $statement->execute(array(':civ' => $civilite,
			                                 ':nom' => $nom ,
			                                 ':prenom' => $prenom,
			                                 ':dn' => $date_naissance,
			                                 ':ln' => $lieu_naissance,
			                                 ':ns' => $num_secu,
			                                 ':adr' => $adresse,
			                                 ':cp' => $cp,
			                                 ':ville' => $ville,
			                                 ':id' => $id));
			return $ret;
		}

	}


?>