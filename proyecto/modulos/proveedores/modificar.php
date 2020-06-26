<?php

require_once '../../class/Proveedor.php';
require_once '../../class/TipoDocumento.php';
$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Proveedor</title>
</head>
<body>

	<h1>Modificar de Proveedores</h1>

	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?= $proveedor->getIdProveedor(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?= $proveedor->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido" value="<?= $proveedor->getApellido(); ?>">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo" value="<?= $proveedor->getSexo(); ?>">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento" value="<?= $proveedor->getFechaNacimiento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>

			<?php
			foreach ($listadoTipoDocumento as $tipoDocumento):
				$selected = '';
				if ($proveedor->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
					$selected = "SELECTED";
				}
			?>

				<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
					<?php echo $tipoDocumento; ?>
				</option>

			<?php endforeach ?>

		</select>
		<br><br> <!-- Salto de lineas -->

		<label>Numero Documento:</label>
		<input type="text" name="txtNumeroDocumento" value="<?= $proveedor->getNumeroDocumento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Razon Social:</label>
		<input type="text" name="txtRazonSocial" value="<?= $proveedor->getRazonSocial(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Cuil</label>
		<input type="text" name="txtCuil" value="<?= $proveedor->getCuil(); ?>">
		<br><br> <!-- Salto de lineas -->

		 <input type="submit" name="btnActualizar" value="Actualizar">			

	</form>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>