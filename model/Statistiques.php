<?php

/**************************************************************************************************************************
**  ad88888ba                               88                      88                                                   **
** d8"     "8b  ,d                   ,d     ""               ,d     ""                                                   **
** Y8,          88                   88                      88                                                          **
** `Y8aaaaa,  MM88MMM  ,adPPYYba,  MM88MMM  88  ,adPPYba,  MM88MMM  88   ,adPPYb,d8  88       88   ,adPPYba,  ,adPPYba,  **
**   `"""""8b,  88     ""     `Y8    88     88  I8[    ""    88     88  a8"    `Y88  88       88  a8P_____88  I8[    ""  **
**         `8b  88     ,adPPPPP88    88     88   `"Y8ba,     88     88  8b       88  88       88  8PP"""""""   `"Y8ba,   **
** Y8a     a8P  88,    88,    ,88    88,    88  aa    ]8I    88,    88  "8a    ,d88  "8a,   ,a88  "8b,   ,aa  aa    ]8I  **
**  "Y88888P"   "Y888  `"8bbdP"Y8    "Y888  88  `"YbbdP"'    "Y888  88   `"YbbdP'88   `"YbbdP'Y8   `"Ybbd8"'  `"YbbdP"'  **
**                                                                               88                                      **
**                                                                               88                                      **
**																														 **
**************************************************************************************************************************/

//Instaciation de la base de données
DataBase::construct();

class Statistiques {
	
	static function nbHommeMoins25ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='M' AND DATEDIFF(CURDATE(), date_naissance) < (365.25 * 25);");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

	static function nbFemmeMoins25ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='Mme' AND DATEDIFF(CURDATE(), date_naissance) < (365.25 * 25);");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

	static function nbHommeEntre25Et50ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='M' AND DATEDIFF(CURDATE(), date_naissance) < (365.25 * 25);");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

	static function nbFemmeEntre25Et50ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='Mme' AND DATEDIFF(CURDATE(), date_naissance) BETWEEN (365.25 * 25) AND (365.25 * 50);");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

	static function nbHommePlus50ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='M' AND DATEDIFF(CURDATE(), date_naissance)  BETWEEN (365.25 * 25) AND (365.25 * 50)");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

	static function nbFemmePlus50ans() {
		$ret = DataBase::$instance->query("SELECT COUNT(*) FROM patient WHERE civilite='Mme' AND DATEDIFF(CURDATE(), date_naissance) > (365.25 * 50);");
		if (!$ret) {
			return false;
		}
		return $ret->fetch()['COUNT(*)'];
	}

}

?>