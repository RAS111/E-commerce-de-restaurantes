<?php

require_once "../../../class/Cliente.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['cboSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];


// VALIDACIONES

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "el nombre no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "el apellido no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "el apellido debe contener al menos 3 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}


if(empty(trim($fechaNacimiento))) {
	$_SESSION['mensaje_error'] = "la fecha no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif($fechaNacimiento > date("Y-m-d")){
	$_SESSION['mensaje_error'] = "la fecha ingresada es incorrecta";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if ((int) $tipoDocumento == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el documento";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if(empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "El numero de documento no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif(strlen(trim($numeroDocumento)) < 8 ){
	$_SESSION['mensaje_error'] = "el numero de documento debe contener al menos 8 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}

// MODIFICAR CLIENTE

$cliente = Cliente::obtenerPorId($id);
$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
$cliente->setSexo($sexo);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setIdTipoDocumento($tipoDocumento);
$cliente->setNumeroDocumento($numeroDocumento);


$cliente->actualizar();

// REDIRECCION

header('Location: ../listado.php?mensaje=2');

?>
