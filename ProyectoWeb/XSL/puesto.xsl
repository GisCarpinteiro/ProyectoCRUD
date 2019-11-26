<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h1>Puestos</h1>
  <table border="1">
    <tr bgcolor="lightgray">
      <th style="text-align:left"> Id </th>
      <th style="text-align:left"> Tipo puesto </th>
    </tr>
    <xsl:for-each select="puestos/puesto">
    <tr>
      <td><xsl:value-of select="id_puesto"/></td>
      <td><xsl:value-of select="tipo_puesto"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>