<?php
$dir_nom = '.'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($dossier as $lien){
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
}

/*if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des fichiers/documents accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($fichier as $lien) {
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
 }*/
?>