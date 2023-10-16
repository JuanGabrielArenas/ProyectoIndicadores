<?php
include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';
include '../controlador/ControlFuente.php';
include '../controlador/ControlRepresenVisual.php';
include '../controlador/ControlResultadoIndicador.php';
include '../controlador/ControlSentido.php';	
include '../controlador/ControlTipoIndicador.php';	
include '../controlador/ControlUnidadMedicion.php';	
include '../modelo/Fuente.php';
include '../modelo/RepresenVisual.php';
include '../modelo/ResultadoIndicador.php';
include '../modelo/Sentido.php';
include '../modelo/TipoIndicador.php';
include '../modelo/UnidadMedicion.php';
$selectTable="";

if (isset($_POST['selectTable'])) $selectTable = $_POST['selectTable'];
switch ($selectTable) {
    case '...':
        
        break;
    case 'Fuente':
        $objControlFuente = new ControlFuente(null);
        $arregloFuentes = $objControlFuente->listar();
        $arregloTabla = $arregloFuentes;
        //var_dump ($arregloFuentes);
    break;
    case 'Representación Visual':
        $objControlRepresenVisual = new ControlRepresenVisual(null);
        $arregloRepresenVisuales = $objControlRepresenVisual->listar();
        $arregloTabla = $arregloRepresenVisuales;
        //var_dump ($arregloRepresenVisuales);
    break;    
    case 'Resultado del Indicador':
        $objControlResultadoIndicador = new ControlResultadoIndicador(null);
        $arregloResultadoIndicadores = $objControlResultadoIndicador->listar();
        $arregloTabla = $arregloResultadoIndicadores;
        //var_dump ($arregloResultadoIndicadores);
    break;
    case 'Sentido':
        $objControlControlSentido = new ControlSentido(null);
        $arregloControlSentidos = $objControlControlSentido->listar();
        $arregloTabla = $arregloControlSentidos;
        //var_dump ($arregloControlSentidos);
    break;
    case 'Tipo de Indicador':
        $objControlTipoIndicador = new ControlTipoIndicador(null);
        $arregloTipoIndicadores = $objControlTipoIndicador->listar();
        $arregloTabla = $arregloTipoIndicadores;
        //var_dump ($arregloTipoIndicadores);
    break;
    case 'Unidad de medicion':
        $objControlUnidadMedicion = new ControlUnidadMedicion(null);
        $arregloUnidadMediciones = $objControlUnidadMedicion->listar();
        $arregloTabla = $arregloUnidadMediciones;
        //var_dump ($arregloUnidadMediciones);
    break;
    default:
        # code...
        break;
}

if(isset($_POST['frmSelectTable'])){
       $miSelect = $_POST['selectTable'];
       
        /* Ya con esto recoge lo que viene del formulario, tambien puedes poner como condicion si no se hace un post en esa pagina que vuelva al formulario o que mande a una pagina 404 */
}else{
     /* ... lo que quieras poner */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Order Details Table with Search Filter</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../vista/css/vista.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Orden <b>Detalle</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refrescar Lista</span></a>
                        <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Exportar a Excel</span></a>
                    </div>
                </div>
            </div>
            <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Mostrar</span>
                            <select class="form-control">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entradas</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <form name="frmConsultarId" action="vista.php" method="post">
                            <div class="filter-group">
                            <label>codigo</label>
                            <input type="text" id="txtIdConsulta" name="txtIdConsulta"class="form-control">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        <form name="frmSelectTable" action="vistaIndicadores.php" method="post">
                            <div class="filter-group">
                                <label>Tabla</label>
                                <select class="form-control" name="selectTable" id="selectTable" name="selectTable">
                                    <option>...</option>
                                    <option>Fuente</option>
                                    <option>Representación Visual</option>
                                    <option>Resultado del Indicador</option>
                                    <option>Sentido</option>
                                    <option>Tipo de Indicador</option>
                                    <option>Unidad de medicion</option>
                                </select>
                                <input type="submit" name="btnConsultarTbl" value="Consultar tabla">
                            </div>
                        </form>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					for($i = 0; $i < count($arregloTabla); $i++){
					?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $arregloTabla[$i]->getId();?></td>
							<td><?php echo $arregloTabla[$i]->getNombre();?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					<?php
					}
					?>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Mostrando <b>5</b> de <b>25</b> entradas</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Anterior</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                </ul>
            </div>
        </div>
    </div>        
</div>     
</body>
</html>