<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlSentido.php';
	include '../modelo/Sentido.php';
	$boton = "";
	$id = "";
	$des = "";
	$objSentido = new Sentido(null);
	$arregloSentido = $objCSentido->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $con = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objSentido = new Sentido($id, $des);
			$objControlSentido = new ControlSentido($objSentido);
			$objControlSentido->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objSentido = new Sentido($id, "");
			$objControlSentido = new ControlSentido($objSentido);
			$objSentido = $objControlSentido->consultar();
			$con = $objSentido->getNombre();
			break;
		case 'Modificar':
			$objSentido = new Sentido($id, $des);
			$objControlSentido = new ControlSentido($objSentido);
			$objControlSentido->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objSentido = new Sentido($id, "");
			$objControlSentido = new ControlSentido($objSentido);
			$objControlSentido->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>