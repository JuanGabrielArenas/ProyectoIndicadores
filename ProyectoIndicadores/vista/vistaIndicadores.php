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
<script src="../vista/js/base.js"></script>
<style>
</style>
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
                        <div class="col-sm-6">
                            <a href="#crudModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Indicadores</span></a>
                            <br>
                        </div>
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
<!-- crud Modal HTML -->
<div id="crudModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaUsuarios.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					
						<div class="container">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home">Datos de indicador</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu1">Fuentes</a>
							</li>
                            <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu2">Representación visual</a>
							</li>
                            <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu3">Resultado indicador</a>
							</li>
                            <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu4">Sentido</a>
							</li>
                            <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu5">Tipo indicador</a>
							</li>
                            <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu6">Unidad medición</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div id="home" class="container tab-pane active"><br>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" value="<?php echo $ema ?>">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" id="txtContrasena" name="txtContrasena" class="form-control" value="<?php echo $con ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
                                    <input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
                                    <input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
                                    <input type="submit" id="btnBorrar" name="bt" class="btn btn-warning" value="Borrar">
                                </div>
                            </div>
							
                            <div id="menu1" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Fuentes</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Representación visual</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Resultado indicador</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu4" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Sentido</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu5" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Tipo indicador</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu6" class="container tab-pane fade"><br>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="combobox1">Unidad medición</label>
                                    <select class="form-control" id="combobox1" name="combobox1">
                                        <?php for($i=0; $i<count($arregloRoles); $i++){ ?>
                                        <option value="<?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>">
                                            <?php echo $arregloRoles[$i]->getId().";". $arregloRoles[$i]->getNombre(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label for="listbox1">Roles específicos del usuario</label>
                                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                                        
                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                                            <button type="button" id="btnRemoverItem" name="bt" class="btn btn-success">Remover Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>				
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
				</div>
			</form>
		</div>
	</div>
</div>   
</body>
</html>