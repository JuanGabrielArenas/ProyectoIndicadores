<?php
    class Actor{
        var $fkidresponsable;
        var $fkidindicador;
        var $fechaasignacion;

        function __construct($fkidresponsable,$fkidindicador,$fechaasignacion){
            $this->fkidresponsable=$fkidresponsable;
            $this->fkidindicador=$fkidindicador;
            $this->fechaasignacion+$fechaasignacion
        }
        function setFkidresponsable ($fkidresponsable){
            $this->fkidresponsable =$fkidresponsable;
        }
        function getFkidresponsable (){
            return $this-> fkidresponsable;
        }
        function setFkidindicador ($fkidindicador){
            $this->fkidindicador =$fkidindicador;
        }
        function getFkidindicador (){
            return $this-> fkidindicador;
        }
        function setFechaasignacion ($fechaasignacion){
            $this->fechaasignacion =$fechaasignacion;
        }
        function getFechaasignacion (){
            return $this-> fechaasignacion;
        }
    }
?>