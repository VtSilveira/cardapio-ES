<?php

  abstract class RegistroDeComprasPrototype {
    protected $cliente;
    protected $numeroCompras;

    abstract public function __clone();

    public function __construct($cliente, $numeroCompras) {
      $this->cliente = $cliente;
      $this->numeroCompras = $numeroCompras;
    }

    public function setNumeroCompras($numeroCompras){
      $this->numeroCompras = $numeroCompras;
    }

    public function getNumeroCompras(){
      return $this->numeroCompras;
    }

    public function getCliente(){
      return $this->cliente;
    }
  }

?>