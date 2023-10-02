<?php

class Cliente {
  private $cpf;
  private $nome;

  public function __construct($cpf, $nome) {
    $this->cpf = $cpf;
    $this->nome = $nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getCpf() {
    return $this->cpf;
  }

  public function getNome() {
    return $this->nome;
  }
}
