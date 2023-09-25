<?php
	$dom = new DomDocument; 
	$dom->load("XML/etudiants.xml");
	
	$id = $_POST['id'];
	$km = $_POST['km'];
	
	$etudiants = $dom->getElementsByTagName('parcours');
	
	foreach($etudiants as $e) {
		$idV = $e->getAttribute('id');
		if ($id == $idV) {
			$e->setAttribute('km', $km);
			break;   
		}
	}

	$dom->save("XML/etudiants.xml");
	header ("Location: distance.php" ); 
?>