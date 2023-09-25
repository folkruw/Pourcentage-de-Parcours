<?php
	$dom = new DomDocument; 
	$dom->load("XML/etudiants.xml");
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$distance = $_POST['distance'];
	
	$etudiants = $dom->getElementsByTagName('etudiant');
	
	foreach($etudiants as $e) {
		$nomV = $e->getAttribute('nom');
		$prenomV = $e->getAttribute('prenom');
		
		if ($nom == $nomV && $prenom == $prenomV) {
			$e->setAttribute('distance', $distance);
			break;   
		}
	}

	$dom->save("XML/etudiants.xml");
	header ("Location: eleves.php" ); 
?>