<?php
class ControlRolUsuario{
    var $objRolUsuario;

    function __construct($objRolUsuario){
        $this->objRolUsuario = $objRolUsuario;
    }

    function guardar(){
        $fkEmail = $this->objRolUsuario->getFkEmail(); 
        $fkIdRol = $this->objRolUsuario->getFkIdRol();
        $comando = "insert into rol_usuario(fkEmail,fkIdRol) values('$fkEmail',$fkIdRol)"; 
        $objControlConexion = new ControlConexion(); 
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando); 
        $objControlConexion->cerrarBd();
    }

    function listarRolesDelUsuario($fkEmail){
        $comandoSql = "SELECT rol.id,rol.nombre 
        FROM rol_usuario INNER JOIN ROL ON rol_usuario.fkidrol=rol.id
        WHERE fkemail='$fkEmail'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloRoles = array();
            $i = 0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $objRol = new Rol(0,"");
                $objRol->setId($row['id']);
                $objRol->setNombre($row['nombre']);
                $arregloRoles[$i] = $objRol;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloRoles;
    }
}
?>