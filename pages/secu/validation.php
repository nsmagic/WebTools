<body bgcolor="Black">
</body>
<?php 

	session_start();

		// Hachage du mot de passe
	
			// Vérification si formulaire rempli complètement 
			if(isset($_POST['login']))
			{
			if(isset($_POST['pass']))
			{
			// Si bien rempli, on commence le travail
			
			// Création des variable 1ère partie
			$username = ($_POST['login']);
			$prepwd = substr($username, 0, 3);
			$postpwd = ($_POST['pass']);
			$pwd1erePartie = sha1($prepwd."$".$postpwd);
			$keyUnique = "bonjour";			
			
			// Création des variable 2ème partie
			$pwd2emePartie = sha1($keyUnique."£".$pwd1erePartie);
			
			//echo Password crypter
			echo $pwd2emePartie; 
	
			$pass_hache = $pwd2emePartie;
			$login = strtoupper($_POST['login']);

	
		// Connexion MySQL
			$bdd = mysql_connect("mysql.alwaysdata.com", "nvi_lecture", "Winter2012")
			or die("Impossible de se connecter : " . mysql_error());
			mysql_select_db('nvi_private');

			if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
			extract($_POST);
		// on recupère le password de la table qui correspond au login du visiteur
			$sql = "select ID, Pseudo, Pass, Grade from T_access where UPPER(Pseudo)='".$login."'";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

			$data = mysql_fetch_assoc($req);

			if($data['Pass'] != $pass_hache) {
			header('Location: ../../index.php');
		   
			exit;
			}
			else {
			
			$login = $data['Pseudo'];
			$grade = $data['Grade'];
			
		//setcookie('NVI',$login,time()+3600);
			$_SESSION['NVI'] = $login;
			$_SESSION['GRADE'] = $grade;
			$_SESSION['LOGIN_TIME'] = time();
			}    
			}
			else {
		  
			header('Location: ../../index.php');
			exit;
			}

			header('Location: ../../index.php');
			mysql_close($bdd);
	
			}
			}

?>