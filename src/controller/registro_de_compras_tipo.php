<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/controller/banco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/model/registro_de_compras_tipo.class.php';

function fetchRegistrosTipo($clienteID) {
  // criar um array de objetos da classe Pratos chamado pratosTeste
  // $pratosTeste = array();
  $registro = [];
  $conn = conectaBD();

  $sql = "SELECT * FROM `registrodecomprastipos` r INNER JOIN `tipos` t ON r.tip_id = t.tip_id where cli_id = " . $clienteID . ";";

  $result = mysqli_query($conn, $sql);

  $primeiro = true;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $cliente = $row["cli_id"];
    $numeroCompras = $row["rdc_numeroCompras"];

    $tiponome = $row["tip_nome"];
    $tipoDescri = $row["tip_descricao"];

    $tipo = new Tipo($tiponome, $tipoDescri);
    $priReg = NULL;

    if ($primeiro == true) {
      $current = new RegistroDeComprasTipo($cliente, $tipo, $numeroCompras);
    } else {
      if ($priReg != NULL) {
        $current = $priReg->clone();

        $current->setNumeroCompras($numeroCompras);
        $current->setTipo($tipo);
      }
    }

    $priReg = $current;
    $registro[] = $current;
  }

  return $registro;
}
