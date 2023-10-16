<?php
    class ControlUnidadMedicion{
        
	   var $objUnidadMedicion;

        function __construct($objUnidadMedicion){
            $this->objUnidadMedicion = $objUnidadMedicion;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $id = $this->objUnidadMedicion->getId(); 
                $des = $this->objUnidadMedicion->getDescripcion();
                $comandoSql = "SELECT * FROM unidadmedicion WHERE id='$id' AND descripcion='$des'";
                $objControlConexion = new ControlConexion();
                $objControlConexion->abrirBd($GLOBALS['serv'], GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
                $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
                try
                {
                    if (mysqli_num_rows($recordSet) > 0) 
                    {
                        $validar = true;
                    }
                    $objControlConexion->cerrarBd();
                }
                catch (Exception $objExcetion)
                {
                    $msg = $objExcetion->getMessage();
                } 
                return $validar;
        }

        function guardar(){
            $id = $this->objUnidadMedicion->getId(); 
            $des = $this->objUnidadMedicion->getDescripcion();
                
            $comandoSql = "INSERT INTO unidadmedicion(id,descripcion) VALUES ('$id', '$des')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objUnidadMedicion->getId(); 
        
            $comandoSql = "SELECT * FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objUnidadMedicion->setdescripcion($row['descripcion']);
            }
            $objControlConexion->cerrarBd();
            return $this->objUnidadMedicion;
        }

        function modificar(){
            $id = $this->objUnidadMedicion->getId(); 
            $des = $this->objUnidadMedicion->getDescripcion();
            
            $comandoSql = "UPDATE unidadmedicion SET descripcion='$des' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objUnidadMedicion->getId(); 
            $comandoSql = "DELETE FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM unidadmedicion";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloUnidadMediciones = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objUnidadMedicion = new UnidadMedicion("","");
                    $objUnidadMedicion->setId($row['id']);
                    $objUnidadMedicion->setNombre($row['descripcion']);
                    $arregloUnidadMediciones[$i] = $objUnidadMedicion;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloUnidadMediciones;
        }
    }
?>