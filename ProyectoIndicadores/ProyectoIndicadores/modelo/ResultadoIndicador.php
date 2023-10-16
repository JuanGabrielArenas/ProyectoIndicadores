<?php
  class ResultadoIndicador{
  	var $id, $resultado, $fechacalculo, $fkidindicador;

  	function __construct($id,$resultado,$fechacalculo,$fkidindicador){
  		$this->id = $id;
  		$this->resultado = $resultado;
        $this->fechacalculo = $fechacalculo;
  		$this->fkidindicador = $fkidindicador;
  	}

  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  	function setResultado($resultado){
  		$this->resultado = $resultado;
  	}

  	function getResultado(){
  		return $this->resultado;
  	}    		

    function setFechacalculo($fechacalculo){
        $this->fechacalculo = $fechacalculo;
    }

    function getFechacalculo(){
        return $this->fechacalculo;
    } 

    function setFkidindicador($fkidindicador){
        $this->fkidindicador = $fkidindicador;
    }

    function getFkidindicador(){
        return $this->fkidindicador;
    }    		
  }
?>