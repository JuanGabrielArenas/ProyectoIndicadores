<?php
    class ControlResultadoIndicador{
        
	   var $objResultadoIndicador;

        function __construct($objResultadoIndicador){
            $this->objResultadoIndicador = $objResultadoIndicador;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $id = $this->objResultadoIndicador->getId(); 
                $res = $this->objResultadoIndicador->getResultado();
                $fec = $this->objResultadoIndicador->getFechacalculo();
                $fki = $this->objResultadoIndicador->getFkidindicador();
                $comandoSql = "SELECT * FROM resultadoindicador WHERE id='$id' AND resultado='$res'";
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
            $id = $this->objResultadoIndicador->getId(); 
            $res = $this->objResultadoIndicador->getResultado();
            $fec = $this->objResultadoIndicador->getFechacalculo();
            $fki = $this->objResultadoIndicador->getFkidindicador();
                
            $comandoSql = "INSERT INTO resultadoindicador(id,resultado,fechacalculo,fkidindicador) VALUES ('$id', '$res', '$fec', '$fki')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objResultadoIndicador->getId(); 
        
            $comandoSql = "SELECT * FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objResultadoIndicador->setResultado($row['resultado']);
                $this->objResultadoIndicador->setFechacalculo($row['fechacalculo']);
                $this->objResultadoIndicador->setFkidindicador($row['fkidindicador']);
            }
            $objControlConexion->cerrarBd();
            return $this->objResultadoIndicador;
        }

        function modificar(){
            $id = $this->objResultadoIndicador->getId(); 
            $res = $this->objResultadoIndicador->getResultado();
            $fec = $this->objResultadoIndicador->getFechacalculo();
            $fki = $this->objResultadoIndicador->getFkidindicador();
            
            $comandoSql = "UPDATE resultadoindicador SET (resultado='$res', fechacalculo='$fec',  fkidindicador='$fki') WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objResultadoIndicador->getId(); 
            $comandoSql = "DELETE FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM resultadoindicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloResultadoIndicadores = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResultadoIndicador = new ResultadoIndicador("","","","");
                    $objResultadoIndicador->setId($row['id']);
                    $objResultadoIndicador->setResultado($row['resultado']);
                    $objResultadoIndicador->setFechacalculo($row['fechacalculo']);
                    $objResultadoIndicador->setFkidindicador($row['fkidindicador']);
                    $arregloResultadoIndicadores[$i] = $objResultadoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloResultadoIndicadores;
        }
    }
?>