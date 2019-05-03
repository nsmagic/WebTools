<?php
	
	// Suivi de session
	session_start();
	
	// Vérification de la validité de la session
	//if ( !isset($_COOKIE['NVI']) ) 
	if(!isset($_SESSION['NVI']))
	{ 
		// Si la variable de session n'existe pas, 
		// alors l'utilisateur n'est pas authentifié 
		// donc on redirige sur la page d'authentification 
		header('Location: /login.php'); 
		exit(); 
	}
	
	// Si connecté, vérifier temps de connexion
	if(($_SESSION['LOGIN_TIME'] + 3600) < time())
	{
		// Si plus d'une heure reset la session + redirection
		session_destroy();
		session_unset();
		session_start();
		
		header('Location: /login.php'); 
		exit();
	}
?>