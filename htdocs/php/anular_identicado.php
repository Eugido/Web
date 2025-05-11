<?php
// Contenido predeterminado del archivo buscar_usuario.xsl
$xml_contenido = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE usuarios SYSTEM "../dtd/usuario_verificado.dtd">
<usuarios xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="../xsd/usuario_verificado.xsd">
    <validacion>false</validacion>
</usuarios>';

// Ruta al archivo usuario_verificado.xml
$file_xml = '../xml/usuario_verificado.xml';

// Intenta escribir el contenido predeterminado en el archivo usuario_verificado.xml
if(file_put_contents($file_xml, $xml_contenido) !== false) {
    echo '<p>Se reescribió el archivo usuario_verificado.xml.</p>';
} else {
    echo '<p>Ocurrió un error al intentar reiniciar el archivo usuario_verificado.xml.</p>';
}
?>

