<!DOCTYPE html>
<html>
	<head>
		<!-- Titre de la page principale -->
		<title>Etudiant</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<!-- Import de la barre de menu -->
		<?php
			include'menu.php';
		?>
		
		<?php
			header('Content-Type: text/html; charset=utf-8');
			if (isset($_GET["nom"])) {
				$nom = $_GET['nom'];
				$prenom = $_GET["prenom"];
				$distance = $_GET["distance"];
				
				// Load XML file
				$xml = new DOMDocument;
				$xml->load('XML/etudiants.xml');

				// Load XSL file
				$xsl = new DOMDocument;
				$xsl->load('XSL/etudiants.xsl');

				// Configure the transformer
				$proc = new XSLTProcessor;

				// Attach the xsl rules
				$proc->importStyleSheet($xsl);

				// Passer des paramètres 
				$proc->setParameter('', 'nom', $nom);
				$proc->setParameter('', 'prenom', $prenom);
				$proc->setParameter('', 'distance', $distance);

				echo $proc->transformToXML($xml); 
								
				echo "<a href='executionSuppression.php?nom=".$nom."&prenom=".$prenom."'><button>Suppression</button></a>";
			}
		?>
	</body>
</html>