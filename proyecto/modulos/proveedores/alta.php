<?php

require_once '../../class/TipoDocumento.php';

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Proveedor</title>
</head>
<body>

	<h1>Registrar Proveedor</h1>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Nombre:</label>
		    <input type="text" name="txtNombre">
		    <br><br> <!-- Este es un comentario -->

		    <label>Apellido:</label>
		    <input type="text" name="txtApellido">
		    <br><br>

		    <label>Sexo:</label>
		    <input type="text" name="txtSexo">
		    <br><br>

		    <label>Fecha Nacimiento:</label>
		    <input type="date" name="txtFechaNacimiento">
			<br><br> <!-- Salto de lineas -->

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento">
				<option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoDocumento as $tipoDocumento): ?>

					<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>">
						<?php echo $tipoDocumento; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Numero Documento:</label>
		    <input type="text" name="txtNumeroDocumento">
			<br><br> <!-- Salto de lineas -->

		    <label>Razon Social:</label>
		    <input type="text" name="txtRazonSocial">
			<br><br> <!-- Salto de lineas -->

			<label>Cuil:</label>
		    <input type="text" name="txtCuil">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>