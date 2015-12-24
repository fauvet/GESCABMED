<?php


/*
	                                                                 
	        "8a           88888888ba   88888888ba,    88888888ba,    
	          "8a         88      "8b  88      `"8b   88      `"8b   
	8888888888  "8a       88      ,8P  88        `8b  88        `8b  
	              "8a     88aaaaaa8P'  88         88  88         88  
	8888888888    a8"     88""""""8b,  88         88  88         88  
	            a8"       88      `8b  88         8P  88         8P  
	          a8"         88      a8P  88      .a8P   88      .a8P   
	        a8"           88888888P"   88888888Y"'    88888888Y"'    

*/
class DataBase {

	//Attribus de la classe

	private static $dsn;
	private static $user;
	private static $psw;
	public  static $instance = null;

	//Contructeur de la classe
	public static function construct(){
		//Si on est en localhost ...
		if ($_SERVER['HTTP_HOST'] == 'localhost') {
			self::$dsn 	= 'mysql:dbname=gescabmed;host=localhost;charset=UTF8';
			self::$user = 'root';
			self::$psw 	= '';
		}
		//Si on est sur hostinger (gescabmed.esy.es)
		else{
			self::$dsn 	= 'mysql:dbname=u298100800_gcm;host=mysql.hostinger.fr';
			self::$user = 'u298100800_root';
			self::$psw 	= 'azerty';
		}

		//On lance la connexion (objet PDO)
		try {
			self::$instance = new PDO(self::$dsn, self::$user, self::$psw);
		}
		catch (Execption $e){
			echo "Erreur connexion PDO".$e->message;
		}
	}
}
?>