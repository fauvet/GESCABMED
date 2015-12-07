<?php

/*

   	   db        88        88  888888888888  ,ad8888ba,    88           ,ad8888ba,         db         88888888ba,    88888888888  88888888ba   
      d88b       88        88       88      d8"'    `"8b   88          d8"'    `"8b       d88b        88      `"8b   88           88      "8b  
     d8'`8b      88        88       88     d8'        `8b  88         d8'        `8b     d8'`8b       88        `8b  88           88      ,8P  
    d8'  `8b     88        88       88     88          88  88         88          88    d8'  `8b      88         88  88aaaaa      88aaaaaa8P'  
   d8YaaaaY8b    88        88       88     88          88  88         88          88   d8YaaaaY8b     88         88  88"""""      88""""88'    
  d8""""""""8b   88        88       88     Y8,        ,8P  88         Y8,        ,8P  d8""""""""8b    88         8P  88           88    `8b    
 d8'        `8b  Y8a.    .a8P       88      Y8a.    .a8P   88          Y8a.    .a8P  d8'        `8b   88      .a8P   88           88     `8b   
d8'          `8b  `"Y8888Y"'        88       `"Y8888Y"'    88888888888  `"Y8888Y"'  d8'          `8b  88888888Y"'    88888888888  88      `8b  
                                                                                                                                               */

function autoLoader($name) {
	//Si la classe est la classe Route
	if($name == 'Route'){
		require_once 'route.php';
	}
	//Sinon c'est un model
	else{
		try {
			require_once "model/".strtolower($name).".php";
		}
		catch(Excpetion $e){
			echo "Model non trouvé\n".$e->message;

		}
	}
}

spl_autoload_register('autoLoader',false,true);

?>