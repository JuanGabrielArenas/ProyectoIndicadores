<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlRol.php';
	include '../modelo/Rol.php';
	$boton = "";
	$id = "";
	$nom = "";
	$objRol = new Rol(null);
	$arregloRol = $objRol->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objRol = new Rol($id, $nom);
			$objControlRol = new ControlRol($objRol);
			$objControlRol->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objRol = new Rol($id, "");
			$objControlRol = new ControlRol($objRol);
			$objRol = $objControlRol->consultar();
			$nom = $objRol->getNombre();
			break;
		case 'Modificar':
			$objRol = new Rol($id, $nom);
			$objControlRol = new ControlRol($objRol);
			$objControlRol->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objRol = new Rol($id, "");
			$objControlRol = new ControlRol($objRol);
			$objControlRol->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>