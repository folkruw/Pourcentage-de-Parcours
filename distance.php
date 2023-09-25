<!DOCTYPE html>
<html>
	<head>
		<!-- Titre de la page principale -->
		<title>Distances parcourues</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<!-- Import de la barre de menu -->
		<?php
			include'menu.php';
		?>
		
		<?php
			header('Content-Type: text/html; charset=utf-8');
			
			// Load XML file
			$xml = new DOMDocument;
			$xml->load('XML/etudiants.xml');

			// Load XSL file
			$xsl = new DOMDocument;
			$xsl->load('XSL/configuration.xsl');
			
			// Configure the transformer
			$proc = new XSLTProcessor;			
			// Attach the xsl rules
			$proc->importStyleSheet($xsl);
			echo $proc->transformToXML($xml);
		?>
	</body>
</html>