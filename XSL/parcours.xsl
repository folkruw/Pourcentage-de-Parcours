<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="UTF-8"/>
	<xsl:param name="nom" select="'non'"/>
	<xsl:variable name="km" select="0" />
	<xsl:decimal-format name="spaces" grouping-separator=" " />

	<xsl:template match="etudiants">
		<html>
			<head>
				<title>Etudiants</title>
				<link rel="stylesheet" href="./CSS/misePage.css"/>
				<link rel="stylesheet" href="./CSS/progressbar.css"/>
			</head>
			<body>
				<h4></h4>
				
				<div class="col-md-12">
					<center>
						<h3 class="bars">
							Vous avez parcouru : <br/>
							<xsl:value-of select="sum(*/@distance)"/> km sur 
							<xsl:value-of select="format-number(parcours/@km, '# ###', 'spaces')"/> km <br/>
							(<xsl:value-of select="format-number((sum(*/@distance) div parcours/@km) * 100, '0.00')"/> %)
						</h3>
					</center>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="{sum(*/@distance)}" aria-valuemin="0" aria-valuemax="{parcours/@km}" style="width:{(sum(*/@distance) div parcours/@km) * 100}%;">
							<span data-toggle="tooltip" data-placement="top" title="{format-number((sum(*/@distance) div parcours/@km) * 100, '0.00')} %"></span>      
						</div>
					</div>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>