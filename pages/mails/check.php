<?php
include '../secu/start.php';
?>

<?php
// Compteur
if(file_exists('compteur_pages_vues.txt'))
{
        $compteur_f = fopen('compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f); 
echo '<strong>'.$compte.'</strong>.<br>';



// Conexion database
$SQL['address'] = 'mysql.alwaysdata.com';
$SQL['username'] = 'nvi_mc';
$SQL['password'] = 'Soleil123';
$SQL['DB'] = 'nvi_mailcheck';

try
{
	$bdd = new PDO('mysql:host=' . $SQL['address'] . ';dbname=' . $SQL['DB'] . ';charset=utf8', $SQL['username'], $SQL['password']);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// Récupération des datas
$response = $bdd->query('SELECT * FROM T_mailChecker');

// Affichage des données
while($data = $response->fetch())
{
	$serveur = $data['MC_Serveur'];
	$port = "993";
	$protocole = "/imap/ssl/novalidate-cert";
	$boite = "INBOX";
	$username = $data['MC_Username'];
	$password = $data['MC_Password'];

	$mbox = imap_open("{".$serveur.":".$port.$protocole."}".$boite, $username, $password, OP_READONLY)
			or die('Connexion impossible : '.imap_last_error());

	$check = imap_mailboxmsginfo($mbox);

	if ($check)
	{	
		$Nom = $data['MC_Nom'];
	    // echo "Messages dans la boite " . $data['MC_Nom'] . " : " . $check->Unread . "<br>"  ;
		$SqlInsert = "INSERT INTO `T_Log_MailChecker`(`LMC_ID`, `LMC_Compteur`, `LMC_Nom`, `LMC_Nombre`) VALUES ('', '$compte', '$Nom', '$check->Unread')";
		
		if ($bdd->query($SqlInsert) === TRUE) {
			echo " ";
		} else {
			echo " ";
		}

		
		
	}
	else
	{
		echo "imap_mailboxmsginfo() failed: " . imap_last_error() . "<br />\n";
	}

	imap_close($mbox);
}

$response->closeCursor();

?>
