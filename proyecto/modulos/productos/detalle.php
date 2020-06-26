<?php

require_once '../../class/Producto.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle del Producto</title>
</head>
<body>

	<h1>Detalle del Producto</h1>
	
	<?=$producto;?>
	<br>
	Stock del producto:
	<?= $producto->getStockActual(); ?>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>