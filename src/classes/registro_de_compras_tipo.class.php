<?php

  class RegistroDeComprasTipo extends RegistroDeComprasPrototype {
    protected $tipo;

    protected function prototype_construct($registroDeComprasTipo) {
      return new RegistroDeComprastipo($registroDeComprasTipo->cliente, $registroDeComprasTipo->tipo, $registroDeComprasTipo->tipo);
    }

    public function __clone(){
      return $this->prototype_construct($this);
    }

    public function __construct($cliente, $tipo, $numeroCompras) {
      $this->cliente = $cliente;
      $this->tipo = $tipo;
      $this->numeroCompras = $numeroCompras;
    }
    
    public function setNumeroCompras($numeroCompras) {
      $this->numeroCompras = $numeroCompras;
    }

    public function getCliente() {
      return $this->cliente;
    }

    public function getNumeroCompras() {
      return $this->numeroCompras;
    }

    public function getTipo(){
      return $this->tipo;
    }
  }

?>