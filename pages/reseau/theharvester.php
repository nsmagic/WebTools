<?php
include '../../pages/secu/start.php';
?>

<html>
    <head>
	<title>Ma page d'accueil</title>
		<style type="text/css">
		  label
			{
				display: block;
				width: 250px;
				float: left;
			}
		</style> 
	</head>
    <body>
        <h1>The Harvester </h1>
        <h2>Notez les informations :</h2>
        <form name="inscription" method="post" action="theharvester.php">
            <label>Entrez votre domaine : </label><input type="text" name="domaine" value='nsmagic.ch'/> <br/>
            <label>Entrez le nombre de recherche : </label><input type="text" name="nombre" value='500'/><br/>
			<label>Entrez le moteur de recherche : </label><input type="text" name="moteur" value='all'/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>



<?php

	$today = date("Ymd-His");
	$domaine = $_POST['domaine'];
	$nbrRecherche = $_POST['nombre'];
	$moteurRecherche = $_POST['moteur'];




	if (!empty($_POST['domaine']))
	{
		if (!empty($_POST['nombre']))
	{
			if (!empty($_POST['moteur']))
	{
				//Script
				$Commande = passthru("/usr/bin/python2.7  /home/nicolas/theHarvester/theHarvester.py -d $domaine -l $nbrRecherche -b $moteurRecherche -f /var/www/clients/client1/web8/web/pages/reseau/logs/TH/$domaine-$today");
				//echo "$Commande";
				//echo </br>;
					?>				
						<a href="./logs/TH/<?php echo($domaine)?>-<?php echo($today)?>"><?php echo($domaine)?>-<?php echo($today)?></a>
					<?php				

	}
			else{echo "Il manque le moteur de recherche";}
	}
		else{echo "Il manque le nombre de recherche max";}
	}
	else{echo "Il manque le nom de domaine ";}

?>


