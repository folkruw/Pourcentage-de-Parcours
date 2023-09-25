<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="UTF-8"/>
	
	<xsl:template match="etudiants">
		<html>
			<head>
				<title>Distance</title>
				<link rel="stylesheet" href="./CSS/misePage.css"/>
				<link rel="stylesheet" href="./CSS/progressbar.css"/>
			</head>
			<body>
				<h3>Modification de la distance</h3>
				<font style="font-size:20px;">
					<table>
						<xsl:for-each select="parcours">
							<tr> <th>Distance</th> </tr>
							<tr> <td><form action="executionModifD.php" method="post">
									<input type="hidden" name="id" value="{@id}" />
									<input type="number" name="km" value="{@km}" />
									<input type="submit" value="Valider" />
								</form>
							</td></tr>
						</xsl:for-each>
					</table>	
				</font>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>