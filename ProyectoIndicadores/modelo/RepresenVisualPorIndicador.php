<?php
    class Actor{
        var $fkidindicador;
        var $fkidrepresenvisual;

        function __construct($fkidindicador,$fkidrepresenvisual){
            $this->fkidindicador=$fkidindicador;
            $this->fkidrepresenvisual=$fkidrepresenvisual;
        }
        function setFkidindicador ($fkidindicador){
            $this->fkidindicador =$fkidindicador;
        }
        function getFkidindicador (){
            return $this-> fkidindicador;
        }
        function setFkidrepresenvisual ($fkidrepresenvisual){
            $this->fkidrepresenvisual =$fkidrepresenvisual;
        }
        function getFkidrepresenvisual (){
            return $this-> fkidrepresenvisual;
        }
    }
?>