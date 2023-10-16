<?php
    class ControlSentido{
        
	   var $objSentido;

        function __construct($objSentido){
            $this->objSentido = $objSentido;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $id = $this->objSentido->getId(); 
                $nom = $this->objSentido->getNombre();
                $comandoSql = "SELECT * FROM sentido WHERE id='$id' AND nombre='$nom'";
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
            $id = $this->objSentido->getId(); 
            $nom = $this->objSentido->getNombre();
                
            $comandoSql = "INSERT INTO sentido(id,nombre) VALUES ('$id', '$nom')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objSentido->getId(); 
        
            $comandoSql = "SELECT * FROM sentido WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objSentido->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objSentido;
        }

        function modificar(){
            $id = $this->objSentido->getId(); 
            $nom = $this->objSentido->getNombre();
            
            $comandoSql = "UPDATE sentido SET nombre='$nom' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objSentido->getId(); 
            $comandoSql = "DELETE FROM sentido WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM sentido";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloSentidos = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objSentido = new Sentido("","");
                    $objSentido->setId($row['id']);
                    $objSentido->setNombre($row['nombre']);
                    $arregloSentidos[$i] = $objSentido;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloSentidos;
        }
    }
?>