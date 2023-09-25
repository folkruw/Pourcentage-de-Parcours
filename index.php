<!DOCTYPE html>
<html>
	<head>
		<!-- Titre de la page principale -->
		<title>Distances parcourues</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		
		<!-- Progression -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		
		<!-- Import du stylesheet de la page -->
		<link href="./CSS/general.css" rel="stylesheet" type="text/css">
		<link href="./CSS/boutons.css" rel="stylesheet" type="text/css">
		<link href="./CSS/misePage.css" rel="stylesheet" type="text/css">
	</head>
	<body>		
		<?php
			header('Content-Type: text/html; charset=utf-8');
			
			// Load XML file
			$xml = new DOMDocument;
			$xml->load('XML/etudiants.xml');

			// Load XSL file
			$xsl = new DOMDocument;
			$xsl->load('XSL/parcours.xsl');
			
			// Configure the transformer
			$proc = new XSLTProcessor;			
			// Attach the xsl rules
			$proc->importStyleSheet($xsl);
			echo $proc->transformToXML($xml);
		?>
	</body>
</html>