<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="UTF-8"/>
	<xsl:param name="nom" select="'non'"/>
	<xsl:variable name="km" select="0" />
	
	<xsl:template match="etudiants">
		<html>
			<head>
				<title>Etudiants</title>
				<link rel="stylesheet" href="./CSS/misePage.css"/>
				<link rel="stylesheet" href="./CSS/progressbar.css"/>
			</head>
			<body>
				<h3>Listes des étudiants</h3>
				<xsl:if test="$nom != 'non'">
					<font style="font-size:20px;">
						<h4></h4>
						<table>
							<xsl:for-each select="etudiant">
								<xsl:if test="@nom = $nom">
									<tr> <th>Nom</th> </tr>
									<tr> <td><xsl:value-of select="@nom"/></td> </tr>
									
									<tr> <th>Prénom</th> </tr>
									<tr> <td><xsl:value-of select="@prenom"/></td></tr>
									
									<tr> <th>Distance</th> </tr>
									<tr> <td><form action="executionModif.php" method="post">
											<input type="hidden" name="nom" value="{@nom}" />
											<input type="hidden" name="prenom" value="{@prenom}" />
											<input type="number" name="distance" value="{@distance}" />
											<input type="submit" value="Valider" />
										</form>
									</td></tr>
								</xsl:if>
							</xsl:for-each>
						</table>	
					</font>
				</xsl:if>
				<xsl:if test="$nom = 'non'">	
					<h4></h4>
					<table>
						<tr><th>Élèves</th><th>Distances</th></tr>
						<xsl:for-each select="etudiant">
							<xsl:sort select="@nom"/>
							<tr>
								<td>
									<a href="informations.php?nom={@nom}&amp;prenom={@prenom}&amp;distance={@distance}">
										<xsl:value-of select="@nom"/>, <xsl:value-of select="@prenom"/>
									</a>
								</td>
								
								<td>
									<xsl:value-of select="@distance"/> km
								</td>
							</tr>
						</xsl:for-each>
					</table>
				</xsl:if>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>