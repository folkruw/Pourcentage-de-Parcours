<?php
	// Ouverture du document XML
	$dom = new DomDocument; 
	$dom->load("XML/etudiants.xml"); // Choix du XML
	
	$nom = $_GET['nom'];
	$prenom = $_GET['prenom'];
	
	// Défini le nom du noeud des éléments
	$delete = $dom->getElementsByTagName('etudiant');	
	foreach($delete as $d) {
		if ($d->getAttribute('nom') == $nom && $d->getAttribute('nom') == $prenom){
			$d->parentNode->removeChild($d);
			break;
		}
	}

	$dom->save("XML/etudiants.xml"); // on sauvegarde le fichier
	header ("Location: index.php"); // Redirection vers la page principale
 ?>