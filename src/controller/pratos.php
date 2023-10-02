<?php

include_once 'banco.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/model/tipo.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/model/prato.class.php';
function fetchPratos() {
  // criar um array de objetos da classe Pratos chamado pratosTeste
  // $pratosTeste = array();
  $pratos = [];
  $conn = conectaBD();

  $sql = "SELECT p.*, t.* FROM pratos p INNER JOIN tipos t ON p.tip_id = t.tip_id";

  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $nome = $row["pra_nome"];
    $preco = $row["pra_preco"];
    $descricao = $row["pra_descricao"];
    $ingredientes = $row["pra_ingredientes"];
    $imagem = $row["pra_imagem"];

    $tiponome = $row["tip_nome"];
    $tipoDescri = $row["tip_descricao"];

    $tipo = new Tipo($tiponome, $tipoDescri);
    $current = new Prato($nome, $tipo, $preco, $descricao, $ingredientes, $imagem);

    $pratos[] = $current;
  }

  return $pratos;
}
