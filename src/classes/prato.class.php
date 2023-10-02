<?php

  class Prato {
    private $nome;
    private $tipo;
    private $preco;
    private $descricao;
    private $ingredientes = array();
    private $imagem;
    private $avaliacoes = array();

    public function __construct($nome, $tipo, $preco, $descricao) {
      $this->nome = $nome;
      $this->tipo = $tipo;
      $this->preco = $preco;
      $this->descricao = $descricao;
    }

    public function addIngrediente($ingrediente) {
      echo("FUNÇÃO NÃO IMPLEMENTADA - addIngrediente!");
    }

    public function removerIngrediente($ingrediente) {
      echo("FUNÇÃO NÃO IMPLEMENTADA - removerIngrediente!");
    }

    public function setPreco($preco) {
      $this->preco = $preco;
    }

    public function setNome($nome) {
      $this->nome = $nome;
    }

    public function setTipo($tipo) {
      $this->tipo = $tipo;
    }

    public function setDescricao($descricao) {
      $this->descricao = $descricao;
    }

    public function setImagem($imagem) {
      $this->imagem = $imagem;
    }

    public function addAvaliacao($avaliacao) {
      echo("FUNÇÃO NÃO IMPLEMENTADA - addAvaliacao!");
    }

    public function getPreco() {
      return $this->preco;
    }

    public function getNome() {
      return $this->nome;
    }

    public function getTipo() {
      return $this->tipo;
    }

    public function getDescricao() {
      return $this->descricao;
    }

    public function getImagem() {
      return $this->imagem;
    }

    public function getAvaliacoes() {
      echo("FUNÇÃO NÃO IMPLEMENTADA - getAvaliacoes!");
    }

  }

?>