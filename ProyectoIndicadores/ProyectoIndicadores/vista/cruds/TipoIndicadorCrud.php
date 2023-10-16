<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlTipoIndicador.php';
	include '../modelo/TipoIndicador.php';
	$boton = "";
	$id = "";
	$des = "";
	$objTipoIndicador = new TipoIndicador(null);
	$arregloTipoIndicador = $objCTipoIndicador->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $con = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objTipoIndicador = new TipoIndicador($id, $des);
			$objControlTipoIndicador = new ControlTipoIndicador($objTipoIndicador);
			$objControlTipoIndicador->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objTipoIndicador = new TipoIndicador$id, "");
			$objControlTipoIndicador = new ControlTipoIndicador($objTipoIndicador);
			$objTipoIndicador = $objControlTipoIndicador->consultar();
			$con = $objTipoIndicador->getNombre();
			break;
		case 'Modificar':
			$objTipoIndicador = new TipoIndicador($id, $des);
			$objControlTipoIndicador = new ControlTipoIndicador($objTipoIndicador);
			$objControlTipoIndicador->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objTipoIndicador = new TipoIndicador($id, "");
			$objControlTipoIndicador = new ControlTipoIndicador($objTipoIndicador);
			$objControlTipoIndicador->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>