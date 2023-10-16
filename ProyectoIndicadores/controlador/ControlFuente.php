<?php
    class ControlFuente{
        
	   var $objFuente;

        function __construct($objFuente){
            $this->objFuente = $objFuente;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $id = $this->objFuente->getId(); 
                $nom = $this->objFuente->getNombre();
                $comandoSql = "SELECT * FROM fuente WHERE id='$id' AND nombre='$nom'";
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
            $id = $this->objFuente->getId(); 
            $nom = $this->objFuente->getNombre();
                
            $comandoSql = "INSERT INTO fuente(id,nombre) VALUES ('$id', '$nom')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objFuente->getId(); 
        
            $comandoSql = "SELECT * FROM fuente WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objFuente->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objFuente;
        }

        function modificar(){
            $id = $this->objFuente->getId(); 
            $nom = $this->objFuente->getNombre();
            
            $comandoSql = "UPDATE fuente SET nombre='$nom' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objFuente->getId(); 
            $comandoSql = "DELETE FROM fuente WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM fuente";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloFuentes = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objFuente = new Fuente("","");
                    $objFuente->setId($row['id']);
                    $objFuente->setNombre($row['nombre']);
                    $arregloFuentes[$i] = $objFuente;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloFuentes;
        }
    }
?>