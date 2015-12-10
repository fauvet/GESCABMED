	
		<h1>Veuillez vous connecter</h1>
		<form action=<?php echo "'".WEBROOT."accueil/connexion'"; ?>; method="POST">
			
			<input class='connexion' type='text'     name='login' placeholder='Login' >	<br>
			<input class='connexion' type='password' name='psw'   placeholder='******'>	<br>
			<input type='submit' value='Connexion'> 
		</form>
