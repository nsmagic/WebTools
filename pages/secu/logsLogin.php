<?
// Variable conexion database
$SQL['address'] = 'mysql.alwaysdata.com';
$SQL['username'] = 'nvi_mc';
$SQL['password'] = 'Soleil123';
$SQL['DB'] = 'nvi_mailcheck';
// Variable logs
$today = date("Y-m-d H:i:s");
$ipLogin = $_SERVER["REMOTE_ADDR"];


 Echo $today; 
 echo "<br>";
 Echo $ipLogin; 




// Connexion MySQL
try
{
	$bdd = new PDO('mysql:host=' . $SQL['address'] . ';dbname=' . $SQL['DB'] . ';charset=utf8', $SQL['username'], $SQL['password']);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


//Envoi des donnée de login
$SqlInsert = "INSERT INTO `T_Logs_Login`(`LL_ID`, `LL_DateHeure`, `LL_IP`, `LL_Username`) VALUES (NULL, '$today', '$ipLogin', '1')";
		
		if ($bdd->query($SqlInsert) === TRUE) {
			echo " ";
		} else {
			echo " ";
		}


?>