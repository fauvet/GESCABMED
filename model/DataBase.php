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
		self::$dsn 	= 'mysql:dbname=gescabmed;host=localhost';
		self::$user 	= 'root';
		self::$psw 	= '';

		try {
			self::$instance = new PDO(self::$dsn, self::$user, self::$psw);
		}
		catch (PDOExecption $e){
			echo "Erreur connexion self".$e->message;
		}
	}
}
?>