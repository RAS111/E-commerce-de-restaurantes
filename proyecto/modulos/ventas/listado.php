<?php

require_once '../../class/Factura.php';

const SIN_ACCION = 0;
const FACTURA_GUARDADO = 1;
const FACTURA_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoFactura = Factura::obtenerTodos();

?>

<!DOCTYPE html>
<html>
	<?php
		include_once('../../head.php');
	?>
<body>

	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Listado de Ventas</h4>
					</div>
					<div class="pb-20">
						<?php if($mensaje == FACTURA_GUARDADO):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Factura Guardada</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php elseif($mensaje == FACTURA_MODIFICADO):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Factura Modificado</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php  endif;?>
						<a type="button" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"  href="../pedidos/listado_factura.php" >
							Pedidos para Facturar
						</a>
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Cliente</th>
									<th>Fecha</th>
									<th>Numero</th>
									<th>Forma de Pago</th>
									<th>Estado</th>
									<th>Total</th>
									<th class="datatable-nosort">Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listadoFactura as $factura): ?>
								<tr>
									<td><?=$factura->getIdFactura();?></td>
									<td><?=$factura->pedido->cliente;?></td>
									<td><?=$factura->getFecha();?></td>
									<td><?=$factura->getNumero();?> </td>
									<td><?=$factura->formaPago;?></td>
									<td><?=$factura->facturaEstado;?></td>
									<td>$<?=$factura->pedido->calcularTotal()?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="detalle.php?id=<?=$factura->getIdFactura();?>">
													<i class="dw dw-eye"></i> Ver
												</a>
												<?php if($factura->facturaEstado->getIdFacturaEstado() != 2):?>
												<a class="dropdown-item" href="../notas_de_creditos/alta.php?id=<?=$factura->getIdFactura();?>">
													<i class="icon-copy dw dw-invoice-1"></i> Nota de Credito
												</a>
												<?php endif;?>
												</div>
										</div>
									</td>
								</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_once('../../file_js.php');
	?>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>