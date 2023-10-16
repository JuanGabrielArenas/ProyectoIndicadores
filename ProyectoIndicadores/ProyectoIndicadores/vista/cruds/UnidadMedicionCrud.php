<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlUnidadMedicion.php';
	include '../modelo/UnidadMedicion.php';
	$boton = "";
	$id = "";
	$des = "";
	$objUnidadMedicion = new UnidadMedicion(null);
	$arregloUnidadMedicion = $objCUnidadMedicion->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtDescripcion'])) $con = $_POST['txtDescripcion'];
	switch ($boton) {
		case 'Guardar':
			$objUnidadMedicion = new UnidadMedicion($id, $des);
			$objControlUnidadMedicion = new ControlUnidadMedicion($objUnidadMedicion);
			$objControlUnidadMedicion->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objUnidadMedicion = new UnidadMedicion($id, "");
			$objControlUnidadMedicion = new ControlUnidadMedicion($objUnidadMedicion);
			$objUnidadMedicion = $objControlUnidadMedicion->consultar();
			$con = $objUnidadMedicion->getDescripcion();
			break;
		case 'Modificar':
			$objUnidadMedicion = new UnidadMedicion($id, $des);
			$objControlUnidadMedicion = new ControlUnidadMedicion($objUnidadMedicion);
			$objControlUnidadMedicion->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objUnidadMedicion = new UnidadMedicion($id, "");
			$objControlUnidadMedicion = new ControlUnidadMedicion($objUnidadMedicion);
			$objControlUnidadMedicion->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>