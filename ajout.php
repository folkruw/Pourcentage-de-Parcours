<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<!-- Import de la barre de menu -->
		<?php
			include 'menu.php';
		?>
		<h3>Ajout d'un étudiant</h3>
		<form action="executionAjout.php" method="post">
			<table>	
				<tr> <th>Nom :</th> </tr> 
				<tr> <td><input type="text" name="nom" id="nom"></td> </tr>
				
				<tr> <th>Prénom :</th> </tr> 
				<tr> <td><input type="text" name="prenom" id="prenom"></td> </tr>
				
				<tr> <th>Distance :</th> </tr> 
				<tr> <td><input type="number" name="distance" id="distance"></td> </tr>
				
				<tr> <td><input type="submit" value="Ajouter"/></td> </tr>
			</table>
		</form>
		<script type="text/javascript" src="JS/JS.js"></script>
	</body>
</html>