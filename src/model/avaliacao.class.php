<?php

  class Avaliacao {
    private $avaliacao;
    private $mensagem;
    private $cliente;

    public function __construct($avaliacao, $mensagem, $cliente) {
      $this->avaliacao = $avaliacao;
      $this->mensagem = $mensagem;
      $this->cliente = $cliente;
    }

    public function getAvaliacao() {
      return $this->avaliacao;
    }

    public function getMensagem() {
      return $this->mensagem;
    }

    public function getCliente() {
      return $this->cliente;
    }

  }
