<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>include</title>
</head>
<body>
<?php
/*
 * EJERCICIO: include
 * Fuente: phpParte1.pdf (Include() y Require()).
 *
 * include("archivo"): incluye y ejecuta el código PHP de otro archivo.
 *   - Si el archivo NO existe muestra un Warning y el programa SIGUE ejecutándose.
 * require("archivo"): igual, pero si el archivo no existe da un Fatal Error y la ejecución TERMINA.
 */
echo "<h2>En este ejemplo se utiliza la funcion include() que ubica codigo php definido en otro archivo asignaciones.php :</h2>";
echo "<h2>Antes de insertar el include las variables declaradas en el mismo no existen</h2>";
echo "<h2>Pero a pesar de ello el ciclo de ejecución continuará hasta el final</h2>";
echo "<h2>Las variables son:</h2>";

// Se intenta mostrar los arreglos ANTES del include -> PHP muestra Warning (variable indefinida)
// pero continúa. El @ delante silencia el warning (NO está en los fuentes, ver nota abajo).
// Para mostrar los warnings como en el video, quitar los @.
echo @$arreglo1[0] . "<br />";
echo @$arreglo1[1] . "<br />";
echo @$arreglo2[0] . "<br />";

echo "<hr /><h2>Ahora se ejecuta el include:</h2>";
include("./asignaciones.php");   // a partir de acá $arreglo1 y $arreglo2 existen

echo "<h2>Las variables son:</h2>";
foreach ($arreglo1 as $elemento) {
    echo $elemento . "<br />";
}
foreach ($arreglo2 as $elemento) {
    echo $elemento . "<br />";
}

/*
 * NOTA (fuera de fuentes): el operador @ antes de una expresión NO está en los PDF.
 * Qué hace: suprime (oculta) los mensajes de error/warning que esa expresión genere.
 */
?>
<p><a href="../index.html">Volver al índice PHP</a></p>
</body>
</html>
