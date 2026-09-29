<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP base</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
<?php
/*
 * EJERCICIO: PHP base
 * Fuente: phpParte1.pdf (marcado PHP, echo, variables, constantes, arreglos,
 * arreglos asociativos, expresiones aritméticas).
 *
 * Todo lo que está fuera de las marcas <?php ?> NO lo procesa PHP: se envía tal cual al navegador.
 */
?>
<b>Esto es texto escrito fuera de las marcas de php. Es entregado en la respuesta http sin pasar por el preprocesador php</b>
<hr />

<?php
// echo: constructor que envía al navegador todo el texto/HTML que recibe.
// Las comillas internas son simples para no cortar el encomillado externo.
echo "<p><b>Texto y/o HTML entregado por el procesador php usando la sentencia echo.</b></p>";
echo "<hr />";

/* ---------- VARIABLES ---------- */
// En PHP no hay palabra clave para declarar: la variable se crea al asignarle un valor.
// Todas las variables llevan $ delante.
$variableA = "valor1";

// El punto (.) es el concatenador de cadenas y variables.
echo "<p><b>El valor de <span class='var'>\$variableA</span> es: " . $variableA . "</b></p>";

// gettype(): función de PHP que devuelve el tipo de la variable (string, integer, boolean, array...)
echo "<p><b>El tipo de <span class='var'>\$variableA</span> es: " . gettype($variableA) . "</b></p>";
echo "<hr />";

/* ---------- ENTEROS Y SUMA ---------- */
$variableB = 2;
$variableC = 3;
echo "<p><b>El valor de <span class='var'>\$variableB</span> es: " . $variableB . "</b></p>";
echo "<p><b>El tipo de <span class='var'>\$variableB</span> es: " . gettype($variableB) . "</b></p>";
echo "<p><b>El valor de <span class='var'>\$variableC</span> es: " . $variableC . "</b></p>";
echo "<p><b>El tipo de <span class='var'>\$variableC</span> es: " . gettype($variableC) . "</b></p>";

// Los paréntesis permiten conservar el tipo de la suma (integer + integer = integer)
$variableD = ($variableB + $variableC);
echo "<p class='marquee'>variableD es la suma de variableB y variableC</p>";
echo "<p class='marquee'>Si los tipos fueran diferentes PHP devolvería el tipo más general (por ejemplo float)</p>";
echo "<p><b>El valor de <span class='var'>\$variableD</span> es: " . $variableD . "</b></p>";
echo "<p><b>El tipo de <span class='var'>\$variableD</span> es: " . gettype($variableD) . "</b></p>";
echo "<hr />";

/* ---------- BOOLEANO ---------- */
$variableF = false;
echo "<p><b>variable tipo booleanas o logicas (falso) <span class='var'>\$variableF</span> : " . $variableF . "</b></p>";
echo "<p><b>El tipo de <span class='var'>\$variableF</span> es: " . gettype($variableF) . "</b></p>";
echo "<hr />";

/* ---------- CONSTANTE ---------- */
// define(): función que define una constante. Las constantes NO llevan $ al usarse.
define("MICONSTANTE", "valorConstante");
echo "<p><b><span class='var'>MICONSTANTE</span> : " . MICONSTANTE . "</b></p>";
echo "<p><b>Tipo de <span class='var'>MICONSTANTE</span>: " . gettype(MICONSTANTE) . "</b></p>";
echo "<hr />";

/* ---------- ARREGLOS DE ÍNDICE NUMÉRICO ---------- */
echo "<h3>Arreglos:</h3>";
// Arreglo de índice numérico con 2 elementos
$aSaludo = ["hola", "hello"];
echo "<p><b><span class='var'>\$aSaludo[0]</span>:" . $aSaludo[0] . "</b></p>";
echo "<p><b><span class='var'>\$aSaludo[1]</span>:" . $aSaludo[1] . "</b></p>";
echo "<p><b>Tipo de <span class='var'>\$aSaludo</span> : " . gettype($aSaludo) . "</b></p>";

echo "<p><b>Se agregan por programa dos elementos nuevos</b></p>";
// array_push(): agrega un elemento al final del array. Argumentos: el array y el valor a agregar.
array_push($aSaludo, "ciao");
array_push($aSaludo, "bonjour");

echo "<h3>Todos los elementos originales y agregados:</h3>";
echo "<ul>";
// foreach: barre el array; en cada vuelta $saludo toma el valor de un elemento.
foreach ($aSaludo as $saludo) {
    echo "<li>" . $saludo . "</li>";
}
echo "</ul>";

/* ---------- ARREGLO DE DOS DIMENSIONES ---------- */
echo "<h3>Arreglo de dos dimensiones (diccionario)</h3>";
// Arreglo de arreglos: cada elemento es a su vez un arreglo (español, inglés, italiano, francés)
$aDiccionarioBasico = [
    ["hola", "hello", "ciao", "bonjour"],
    ["adios", "good by", "arrivederci", "au revoir"],
    ["casa", "house", "casa", "maison"]
];
echo "<p><b>La variable <span class='var'>\$aDiccionarioBasico</span> tiene el siguiente tipo: " . gettype($aDiccionarioBasico) . "</b></p>";
echo "<table class='dic'><tr><th>Español</th><th>Ingles</th><th>Italiano</th><th>Francés</th></tr>";
foreach ($aDiccionarioBasico as $renglon) {          // primer foreach: cada fila
    echo "<tr>";
    foreach ($renglon as $palabra) {                 // segundo foreach: cada celda de la fila
        echo "<td>" . $palabra . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
// Acceso por dos índices: [fila][columna]
echo "<h3>Tambien asi se puede expresar el valor de <span class='var'>\$aDiccionarioBasico[1][3]</span>:" . $aDiccionarioBasico[1][3] . "</h3>";
// count(): devuelve la cantidad de elementos de un array
echo "<h3>Cantidad de elementos de diccionario: " . count($aDiccionarioBasico) . "</h3>";

/* ---------- ARREGLO ASOCIATIVO ---------- */
echo "<h2>Variables tipo arreglo asociativo</h2>";
echo "<p class='marquee'>Cargar por programa una variable de tipo arreglo asociativo y mostrar sus atributos, la cantidad de elementos y su tipo</p>";
// Arreglo asociativo: el índice es una cadena (clave) en lugar de un número
$aArticulo = [
    "codArt"         => "cp001",
    "descripcionArt" => "jaguel",
    "precioUnitario" => 20,
    "cantidad"       => 2
];
echo "Codigo de articulo: " . $aArticulo['codArt'] . "<br />";
echo "tipo del elemento: " . gettype($aArticulo['codArt']) . "<br />";
echo "Descripcion del articulo: " . $aArticulo['descripcionArt'] . "<br />";
echo "tipo del elemento: " . gettype($aArticulo['descripcionArt']) . "<br />";
echo "Precio unitario: " . $aArticulo['precioUnitario'] . "<br />";
echo "tipo del elemento: " . gettype($aArticulo['precioUnitario']) . "<br />";
echo "Cantidad: " . $aArticulo['cantidad'] . "<br />";
echo "tipo del elemento: " . gettype($aArticulo['cantidad']) . "<br /><br />";
echo "Cantidad de elementos del arreglo: " . count($aArticulo) . "<br />";
echo "Tipo de dato del arreglo: " . gettype($aArticulo) . "<br />";
echo "<hr />";

/* ---------- EXPRESIONES ARITMÉTICAS ---------- */
echo "<p><b>Expresiones aritmeticas</b></p>";
$x = 3;
$y = 4;
echo "<p><b>La variable <span class='var'>\$x</span> tiene el siguiente valor: " . $x . "</b></p>";
echo "<p><b>La variable <span class='var'>\$y</span> tiene el siguiente valor: " . $y . "</b></p>";
echo "<p><b>La variable <span class='var'>\$x</span> tiene el siguiente tipo: " . gettype($x) . "</b></p>";
echo "<p><b>La variable <span class='var'>\$y</span> tiene el siguiente tipo: " . gettype($y) . "</b></p>";
echo "<p><b>Asi se imprime una expresión aritmetica por ejemplo de Suma: (<span class='var'>\$x</span> + <span class='var'>\$y</span>) = " . ($x + $y) . "</b></p>";
echo "<p><b>Asi se imprime una expresión aritmetica por ejemplo de Multiplicación: <span class='var'>\$x</span> * <span class='var'>\$y</span> = " . ($x * $y) . "</b></p>";
?>
<p><a href="../index.html">Volver al índice PHP</a></p>
</body>
</html>
