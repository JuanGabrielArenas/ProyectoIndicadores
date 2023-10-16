<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlResultadoIndicador.php';
	include '../modelo/ResultadoIndicador.php';
	$boton = "";
	$id = "";
	$res = "";
    $fec = "";
    $fki = "";
	$objResultadoIndicador = new ResultadoIndicador(null);
	$arregloResultadoIndicador = $objCResultadoIndicador->listar();
	
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtResultado'])) $res = $_POST['txtResultado'];
    if (isset($_POST['txtFechacalculo'])) $fec = $_POST['txtFechacalculo'];
    if (isset($_POST['txtFkidindicador'])) $fki = $_POST['txtFkidindicador'];
	switch ($boton) {
		case 'Guardar':
			$objResultadoIndicador = new ResultadoIndicador($id, $res, $fec, $fki);
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objControlResultadoIndicador->guardar();
			header('Location: vista.php');
			break;
		case 'Consultar':
			$objResultadoIndicador = new ResultadoIndicador($id, "");
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objResultadoIndicador = $objControlResultadoIndicador->consultar();
			$res = $objResultadoIndicador->getResultado();
            $fec = $objResultadoIndicador->getFechacalculo();
            $fki = $objResultadoIndicador->getFkidindicador();
			break;
		case 'Modificar':
			$objResultadoIndicador = new ResultadoIndicador($id, $res, $fec, $fki);
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objControlResultadoIndicador->modificar();
			header('Location: vista.php');
			break;
		case 'Borrar':
			$objResultadoIndicador = new ResultadoIndicador($id, "");
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objControlResultadoIndicadore->borrar();
			header('Location: vista.php');
			break;
		
		default:
			# code...
			break;
	}
?>