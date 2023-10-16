<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlFuente.php';
	include '../modelo/Fuente.php';
	$boton = "";
	$id = "";
	$nom = "";
	$objFuente = new Fuente(null);
	$arregloFuente = $objFuente->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objFuente = new Fuente($id, $nom);
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objFuente = new Fuente($id, "");
			$objControlFuente = new ControlFuente($objFuente);
			$objFuente = $objControlFuente->consultar();
			$nom = $objFuente->getNombre();
			break;
		case 'Modificar':
			$objFuente = new Fuente($id, $nom);
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objFuente = new Fuente($id, "");
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>