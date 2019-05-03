<?php
include '../secu/start.php';
?>

<html>
	<head>
		<title></title>
		<style type="text/css">
		table
		{
			border-width:1px; 
			border-style:solid; 
			border-color:black;
			width:50%;
		}
		td 
		{
			border-width:1px;
			border-style:solid; 
			width:50%;
		}
		</style>
		
		<meta http-equiv="refresh" content="600; url="index.php" />
	</head>


<?php
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
$response = $bdd->query('select * from `T_Log_MailChecker` where `LMC_Compteur` = ( select max(`LMC_Compteur`) from `T_Log_MailChecker`)');

// Affichage des données
while($data = $response->fetch())
{
	$Nom = $data['LMC_Nom'];
	$Nombre = $data['LMC_Nombre'];
	$Compteur = $data['LMC_Compteur'];
	$ID = $data['LMC_ID'];

?>	
	
	<table>
	<tr>
       <td><?php echo $Nom ?></td>
	   <td><?php echo $Nombre ?></td>
	</tr>	
	</table>
	
<?php
	imap_close($mbox);
}

$response->closeCursor();




?>