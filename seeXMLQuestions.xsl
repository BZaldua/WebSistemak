<?xml version="1.0" encoding ="ISO-8859-1"?>
<xsl:stylesheet version= "1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
	<table>
		<thead>
			<tr><th>Enuntziatua</th><th>Konplexutasuna</th><th>Gaia</th></tr>
		</thead>
	<xsl:for-each select ="/assessmentItems/assessmentItem">
		<tr>
			<td> <FONT SIZE="2">
				<xsl:value-of select ="itemBody/p"/><BR/>
			</FONT></td>
			
			<td><FONT SIZE="2">
				<xsl:value-of select ="@konplexutasuna"/><BR/>
			</FONT></td>
		
			<td><FONT SIZE="2">
				<xsl:value-of select ="@gaia"/><BR/>
			</FONT></td>
		</tr>
	</xsl:for-each>
	</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
