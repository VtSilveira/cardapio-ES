<?php

include_once 'banco.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/model/registro_de_compras_prato.class.php';

function fetchRegistrosPrato($clienteID) {
  // criar um array de objetos da classe Pratos chamado pratosTeste
  // $pratosTeste = array();
  $registro = [];
  $conn = conectaBD();

  $sql = "SELECT * FROM `registrodecompraspratos` r INNER JOIN pratos p on r.pra_id = p.pra_id INNER JOIN tipos t on t.tip_id = p.tip_id where cli_id = " . $clienteID . ";";

  $result = mysqli_query($conn, $sql);

  $primeiro = true;
  $priReg = NULL;

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $cliente = $row["cli_id"];
    $numeroCompras = $row["rdc_numeroCompras"];

    $nome = $row["pra_nome"];
    $preco = $row["pra_preco"];
    $descricao = $row["pra_descricao"];
    $ingredientes = $row["pra_ingredientes"];
    $imagem = $row["pra_imagem"];

    $tiponome = $row["tip_nome"];
    $tipoDescri = $row["tip_descricao"];

    $tipo = new Tipo($tiponome, $tipoDescri);
    $prato = new Prato($nome, $tipo, $preco, $descricao, $ingredientes, $imagem);

    if ($primeiro == true) {
      $current = new RegistroDeComprasPrato($cliente, $prato, $numeroCompras);
    } else {
      if ($priReg != NULL) {
        $current = $priReg->clone();
        $current->setNumeroCompras($numeroCompras);
        $current->setPrato($prato);
      } else {
        return [];
      }
    }
    $priReg = $current;
    $registro[] = $current;
  }

  return $registro;
}
