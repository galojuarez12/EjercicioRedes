<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Respuesta</title>
</head>
<body>
<?php
/*
 * EJERCICIO: Formularios
 * Fuente: phpParte1.pdf (Lectura de formularios).
 *
 * $_GET: arreglo global asociativo con los datos recibidos por método GET
 * (los del form con method="get" o los pasados en la URL luego de "?").
 * $_POST: ídem para método POST. El índice es el atributo name del input.
 * Si en index.html se cambia method="get" por "post", cambiar $_GET por $_POST acá.
 */
echo "Valores pasados:<br />";
echo "Nombre = " . $_GET['nombre'] . "<br />";
echo "Apellido = " . $_GET['apellido'] . "<br />";
?>
<!-- Botón Volver: history.back() es JavaScript, vuelve a la página anterior (visto en jsParte2 como uso de objetos del BOM) -->
<button onclick="history.back()">Volver</button>
</body>
</html>
