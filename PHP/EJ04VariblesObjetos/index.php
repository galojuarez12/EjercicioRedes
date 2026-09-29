<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Variables tipo objeto</title>
<style>
    span.var { color: blue; }
    table { border-collapse: collapse; }
    td { border: 1px solid gray; padding: 3px 8px; }
</style>
</head>
<body>
<?php
/*
 * EJERCICIO: Variables tipo objeto
 * Fuente: phpParte1.pdf (Variables de tipo objeto, Array de renglones, Producción de un nuevo objeto, json_encode).
 */
echo "<h1>Variables tipo objeto en PHP. Objeto renglon de pedido</h1>";
echo "<h1><span class='var'>\$objRenglonPedido</span></h1>";

// new stdClass: instancia la clase estándar vacía de PHP. Sus atributos se asignan con ->
$objRenglonPedido = new stdClass;
$objRenglonPedido->codArt = "cp001";
$objRenglonPedido->descripcionArt = "jaguel 800 gr";
$objRenglonPedido->precioUnitario = 30;
$objRenglonPedido->cantidad = 2;

echo "Codigo de articulo: " . $objRenglonPedido->codArt . "<br />";
echo "Descripcion del articulo: " . $objRenglonPedido->descripcionArt . "<br />";
echo "Precio unitario: " . $objRenglonPedido->precioUnitario . "<br />";
echo "Cantidad: " . $objRenglonPedido->cantidad . "<br />";
// gettype() sobre un objeto devuelve "object"
echo "<h1>Tipo de <span class='var'>\$objRenglonPedido</span>: " . gettype($objRenglonPedido) . "</h1>";

echo "<h1>Definamos arreglo de pedidos:</h1>";
echo "<h1><span class='var'>\$renglonesPedido</span></h1>";
$renglonesPedido = [];                              // arreglo vacío
array_push($renglonesPedido, $objRenglonPedido);    // primer renglón

// Segundo renglón: se crea otro objeto
$objRenglonPedido2 = new stdClass;
$objRenglonPedido2->codArt = "cp002";
$objRenglonPedido2->descripcionArt = "atun 800 gr";
$objRenglonPedido2->precioUnitario = 24;
$objRenglonPedido2->cantidad = 3;
array_push($renglonesPedido, $objRenglonPedido2);

echo "<h1>Tipo de <span class='var'>\$renglonesPedido</span>: " . gettype($renglonesPedido) . "</h1>";
echo "<h1>Tabula <span class='var'>\$renglonesPedido</span>. Recorrer el arreglo de renglones y tabularlos con html:</h1>";

// foreach: barre el arreglo y arma una fila de tabla por cada objeto
echo "<table>";
foreach ($renglonesPedido as $objRenglon) {
    echo "<tr>";
    echo "<td>" . $objRenglon->codArt . "</td>";
    echo "<td>" . $objRenglon->descripcionArt . "</td>";
    echo "<td>" . $objRenglon->precioUnitario . "</td>";
    echo "<td>" . $objRenglon->cantidad . "</td>";
    echo "</tr>";
}
echo "</table>";

// count(): cantidad de elementos del arreglo
echo "<h2>Cantidad de renglones: " . count($renglonesPedido) . "</h2>";

/* ---------- Objeto RENGLONES que contiene el arreglo y otros atributos ---------- */
$objRenglonesPedido = new stdClass();
$objRenglonesPedido->renglonesPedido = $renglonesPedido;                 // atributo con el arreglo completo
$objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);      // atributo numérico

// json_encode(): convierte una variable/objeto de PHP a texto JSON para enviarlo al navegador.
// Reemplaza al "json source .js" de los ejercicios del lado del cliente.
$jsonRenglonesPedido = json_encode($objRenglonesPedido);
echo "<h2>Objeto renglones codificado como JSON:</h2>";
echo "<p>" . $jsonRenglonesPedido . "</p>";
?>
<p><a href="../index.html">Volver al índice PHP</a></p>
</body>
</html>
