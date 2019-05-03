<?php
// include '../../pages/secu/start.php';
?>

<header>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style>
label
{
	display: block;
	width: 100px;
	float: left;
}

</style>


</header>

<form method="post" >

<label>Domain/IP :</label><input type="text" name="domain" /><br />
<!-- <label>Ports :</label><input type="text" name="ports" /> "Séparer par des virgules"<br /> -->

	<input type="submit" value="Scan" />
</form>
<br />


<?php
// Prend la date et le domaine pour nommé le fichier texte
if(!empty($_POST['domain'])) {
$today = date("Y.d.m");
$heure = date("H.i.s");
$domaine = $_POST['domain'];


// Créer dossier 
$dossier1 = './logs/PS/'.$domaine;
if(!is_dir($dossier1)){
   mkdir($dossier1);
}
$dossier2 = './logs/PS/'.$domaine."/".$today;
if(!is_dir($dossier2)){
   mkdir($dossier2);
}

// Créer fichier txt
$manip = fopen("./logs/PS/$domaine/$today/$heure.txt", "w+");
if($manip==false)
die("La création du fichier a échoué");

// nom du fichier
$file = "./logs/PS/$domaine/$today/$heure.txt";

}
?>


 
<?php
if(!empty($_POST['domain'])) {	
	//list of port numbers to scan
	$ports = array(	21, 25, 80, 443, 587, 1723, 3389, 3390, 3391, 3392);
	
		
	
	$results = array();
	foreach($ports as $port) {
		if($pf = @fsockopen($_POST['domain'], $port, $err, $err_string, 1)) {
			$results[$port] = true;
			fclose($pf);
		} else {
			$results[$port] = false;
		}
	}
 
	foreach($results as $port=>$val)	{
		$prot = getservbyport($port,"tcp");
                //echo "Port $port ($prot): ";
		if($val) {
			echo "Port $port ($prot): ";
			echo "<span style=\"color:green\">OK</span><br/>";
				
				# Ouverture en mode écriture
				$fileopen=(fopen("$file",'a'));
				# Ecriture de "Début du fichier" dansle fichier texte
				fwrite($fileopen,"Port".$port." : OK".PHP_EOL);
				# On ferme le fichier proprement
				fclose($fileopen);

		}
		else {
			//echo "<span style=\"color:red\">Inaccessible</span><br/>";
				
				# Ouverture en mode écriture
			//	$fileopen=(fopen("$file",'a'));
				# Ecriture de "Début du fichier" dansle fichier texte
			//	fwrite($fileopen,"Port".$port." : Inaccessible".PHP_EOL);
				# On ferme le fichier proprement
			//	fclose($fileopen);
 
				
		}
	}
}
?>