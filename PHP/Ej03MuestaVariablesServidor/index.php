<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Variables de servidor</title>
<style>
    table { border-collapse: collapse; background-color: beige; margin-bottom: 10px; }
    td { border: 1px solid #ccc; padding: 4px 8px; }
</style>
</head>
<body>
<?php
/*
 * EJERCICIO: Variables de servidor
 * Fuente: phpParte1.pdf (Variables Globales de Servidor).
 *
 * $_SERVER es un arreglo global asociativo. Cada índice es una cadena que describe el dato.
 * Se divide en tres grupos: variables de servidor, de cliente y de requerimiento.
 */

// Función propia para no repetir código: recibe un título y la lista de claves y arma una tabla.
function muestraGrupo($titulo, $claves) {
    echo "<h1>" . $titulo . "</h1><table>";
    foreach ($claves as $clave) {
        // $_SERVER[$clave]: valor de esa variable de servidor
        echo "<tr><td>" . $clave . "</td><td>" . $_SERVER[$clave] . "</td></tr>";
    }
    echo "</table>";
}

// Variables de servidor (parámetros del server)
muestraGrupo("Variables de servidor", ["SERVER_ADDR", "SERVER_PORT", "SERVER_NAME", "HTTP_HOST", "DOCUMENT_ROOT"]);
// Variables de cliente (parámetros del navegador remoto)
muestraGrupo("Variables de cliente", ["REMOTE_ADDR", "REMOTE_PORT"]);
// Variables de requerimiento (parámetros del requerimiento HTTP)
muestraGrupo("Variables de Requerimiento", ["SCRIPT_NAME", "REQUEST_METHOD", "REQUEST_URI", "QUERY_STRING"]);

// foreach con clave => valor: barre TODO el arreglo $_SERVER
echo "<h1>TODAS</h1><table>";
foreach ($_SERVER as $key_name => $key_value) {
    // Algunos valores pueden ser arreglos; se convierten a texto para poder mostrarlos.
    // is_array() y implode() NO están en los fuentes: is_array() devuelve true si la variable es un array;
    // implode() une los elementos de un array en un solo texto separados por el separador dado.
    if (is_array($key_value)) { $key_value = implode(", ", $key_value); }
    echo "<tr><td>" . $key_name . "</td><td>" . $key_value . "</td></tr>";
}
echo "</table>";
?>
<p><a href="../index.html">Volver al índice PHP</a></p>
</body>
</html>
