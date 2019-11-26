<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h1>Trabajador</h1>
  <table border="1">
    <tr bgcolor="lightgray">
      <th style="text-align:left"> Id </th>
      <th style="text-align:left"> Nombre </th>
      <th style="text-align:left"> Apellido </th>
      <th style="text-align:left"> Teléfono </th>
      <th style="text-align:left"> Contraseña </th>
      <th style="text-align:left"> Puesto </th>



    </tr>
    <xsl:for-each select="trabajadores/trabajador">
    <tr>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="nombre"/></td>
      <td><xsl:value-of select="apellido"/></td>
      <td><xsl:value-of select="telefono"/></td>
      <td><xsl:value-of select="contrasena"/></td>
      <td><xsl:value-of select="tipo_puesto"/></td>

    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>