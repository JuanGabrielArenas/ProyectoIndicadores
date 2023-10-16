<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlRepresenVisual.php';
	include '../modelo/RepresenVisual.php';
	$boton = "";
	$id = "";
	$nom = "";
	$objRepresenVisual = new RepresenVisual(null);
	$arregloRepresenVisual = $objRepresenVisual->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objRepresenVisual = new RepresenVisual($id, $nom);
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objControlRepresenVisual->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objRepresenVisual = new RepresenVisual($id, "");
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objRepresenVisual = $objControlRepresenVisual->consultar();
			$nom = $objRepresenVisual->getNombre();
			break;
		case 'Modificar':
			$objRepresenVisual = new RepresenVisual($id, $nom);
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objControlRepresenVisual->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objRepresenVisual = new RepresenVisual($id, "");
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objControlRepresenVisual->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>