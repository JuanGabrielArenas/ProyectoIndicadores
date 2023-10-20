<?php
    class Actor{
        var $id;
        var $nombre;
        var $fechacreacion;
        var $fkemailusuario;

        function __construct($id,$nombre,$fechacreacion,$fkemailusuario){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->fechacreacion=$fechacreacion;
            $this->fkemailusuario+$fkemailusuario
        }
        function setId ($id){
            $this->id =$id;
        }
        function getId (){
            return $this-> id;
        }
        function setNombre ($nombre){
            $this->nombre =$nombre;
        }
        function getNombre (){
            return $this-> nombre;
        }
        function setFechacreacion ($fechacreacion){
            $this->fechacreacion =$fechacreacion;
        }
        function getFechacreacion (){
            return $this-> fechacreacion;
        }
        function setFkemailusuario ($fkemailusuario){
            $this->fkemailusuario =$fkemailusuario;
        }
        function getFkemailusuario (){
            return $this-> fkemailusuario;
        }
    }
?>