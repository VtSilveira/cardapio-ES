<?php

  class RegistroDeComprasPrato extends RegistroDeComprasPrototype {
    protected $prato;

    protected function prototype_construct($registroDeComprasPrato) {
      return new RegistroDeComprasPrato($registroDeComprasPrato->cliente, $registroDeComprasPrato->prato, $registroDeComprasPrato->numeroCompras);
    }

    public function __clone(){
      return $this->prototype_construct($this);
    }

    public function __construct($cliente, $prato, $numeroCompras) {
      $this->cliente = $cliente;
      $this->prato = $prato;
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

    public function getPrato(){
      return $this->prato;
    }
  }

?>