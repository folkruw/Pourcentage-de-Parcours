<head>
	<title>Execution d'ajout</title>
	<link rel="stylesheet" href="xsl/Produits.css"/>
</head>	

<?php
	$dom = new DomDocument; 
	$dom->load("XML/etudiants.xml");

	$nouveauEtudiant = $dom->createElement("etudiant");
	$nouveauEtudiant->setAttribute("nom", $_POST['nom']);
	$nouveauEtudiant->setAttribute("prenom", $_POST['prenom']);
	$nouveauEtudiant->setAttribute("distance", $_POST['distance']);
		
	$dom->getElementsByTagName("etudiants")->item(0)->appendChild($nouveauEtudiant);
	
	$dom->save("XML/etudiants.xml");
	echo('traitement terminé avec succès');
	header ("Location: $_SERVER[HTTP_REFERER]" );
?>