<?php

if (!empty($_POST['typehash']))
{//si la variable exemple_1 n'est pas vide (et donc existe et est remplie) alors il se passe ceci :

	if (!empty($_POST['hash']))
	{//si la variable exemple_1 n'est pas vide (et donc existe et est remplie) alors il se passe ceci :

	$hash = ($_POST['hash']);
	$hash_type = ($_POST['typehash']);
	$email = "n.magic88@gmail.com";
	$code = "6ef626d93a9f5a7d";
	$reponse = file_get_contents("http://md5decrypt.net/Api/api.php?hash=".$hash."&hash_type=".$hash_type."&email=".$email."&code=".$code);
	echo $reponse;

	}
	else
	{//sinon il ce passe ceci : 
		header('Location: ../../../index.php');
	}

}
else
{//sinon il ce passe ceci : 
	header('Location: ../../../index.php');
}
?>