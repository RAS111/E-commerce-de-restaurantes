<?php

require_once '../../class/Barrio.php';
$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];



?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>
<!--<script src="../../static/js/domicilios/validaciones.js"></script>-->
<body>

	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Agregar Domicilio</h4>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <input type="hidden" name="txtIdPersona" id="txtIdPersona" value='<?php echo $idPersona ?>'>
										    <input type="hidden" name="txtIdLlamada" id="txtIdLlamada" value='<?php echo $idLlamada ?>'>
										    <input type="hidden" name="txtModulo" id="txtModulo" value='<?php echo $moduloLlamada ?>'>
									        <label>Calle:</label>
										    <input type="text" name="txtCalle" id="txtCalle" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <label>Altura:</label>
										    <input type="number" name="txtAltura" id="txtAltura"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Barrio: </label>
											<select name="cboBarrio" id="cboBarrio" class="custom-select form-control">
												<option value="0">Seleccionar</option>

												<?php foreach ($listadoBarrio as $barrio): ?>

													<option value="<?php echo $barrio->getIdBarrio(); ?>">
														<?php echo $barrio; ?>
													</option>

												<?php endforeach ?>

											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <label>Manzana:</label>
										    <input type="number" name="txtManzana" id="txtManzana" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Casa:</label>
										    <input type="number" name="txtCasa" id="txtCasa" class="form-control">
									   	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <label>Piso:</label>
										    <input type="number" name="txtPiso" id="txtPiso" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Departamento:</label>
										    <input type="number" name="txtDepartamento" id="txtDepartamento" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">	
											<label>Torre:</label>
										    <input type="number" name="txtTorre" id="txtTorre" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Sector:</label>
										    <input type="number" name="txtSector" id="txtSector" class="form-control">
										</div>
									</div>
								</div>
							</section>	
							<input type="submit" class="btn btn-success" value="Guardar" onclick="validarDatos();">		
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--JS-->
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<script src="../../static/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../static/vendors/scripts/steps-setting.js"></script>							
</body>
</html>