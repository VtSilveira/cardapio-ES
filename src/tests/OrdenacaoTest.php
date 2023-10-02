<?php

// Inclusão do framework PHPUnit
use PHPUnit\Framework\TestCase;

include_once __DIR__ . "/../model/cardapio.class.php";
include_once __DIR__ . "/../model/cliente.class.php";
include_once __DIR__ . "/../model/prato.class.php";
include_once __DIR__ . "/../model/tipo.class.php";
include_once __DIR__ . "/../model/registro_de_compras_prototype.class.php";
include_once __DIR__ . "/../model/registro_de_compras_prato.class.php";
include_once __DIR__ . "/../model/registro_de_compras_tipo.class.php";

class OrdenacaoTest extends TestCase {
  public function testOrdenarPorTipo() {
    $registrosCompra = [];
    $pratos = [];
    $tipos = [];
    $cardapio = new Cardapio();
    // create new cliente with nome and cpf
    $cliente = new Cliente("123.456.789-00", "João da Silva");


    // create tipos
    $tipos[0] = new Tipo("Italiana", "Macarrão bolonhesa e Pizza");
    $tipos[1] = new Tipo("Fast-food", "Cheese-burguer, Pastel de carne e Frango frito");
    $tipos[2] = new Tipo("Oriental", "Sashimi e Temaki");

    // create pratos italiana
    $pratos[0] = new Prato("Pizza", $tipos[0], 20.00, "Pizza de calabresa", "Calabresa, queijo, molho de tomate", "pizza.jpg");
    $pratos[1] = new Prato("Macarrão", $tipos[0], 15.00, "Macarrão bolonhesa", "Macarrão, molho de tomate, carne moída", "macarrao.jpg");

    // create pratos fast-food
    $pratos[2] = new Prato("Cheese-burguer", $tipos[1], 10.00, "Cheese-burguer", "Pão, carne, queijo, molho especial", "cheese-burguer.jpg");
    $pratos[3] = new Prato("Pastel de carne", $tipos[1], 15.00, "Pastel de carne", "Massa frita", "pastel.jpg");
    $pratos[4] = new Prato("Frango frito", $tipos[1], 15.00, "Frango frito", "Carne branca no óleo", "frango.jpg");

    // create pratos orientais
    $pratos[5] = new Prato("Sashimi", $tipos[2], 15.00, "Sashimi", "Peixe cru", "sashimi.jpg");
    $pratos[6] = new Prato("Temaki", $tipos[2], 15.00, "Temaki", "Peixe cru enrolado", "temaki.jpg");

    // create new compra with cliente and pratos
    $registrosCompra[0] = new RegistroDeComprasTipo($cliente, $tipos[0], 2);
    $registrosCompra[1] = new RegistroDeComprasTipo($cliente, $tipos[1], 3);

    $resultadoOrdenado = $cardapio->getCardapioOrdenadoTipo($pratos, $registrosCompra);
    $resultadoEsperado = [
      $pratos[2],
      $pratos[3],
      $pratos[4],
      $pratos[0],
      $pratos[1],
      $pratos[5],
      $pratos[6],
    ];

    $this->assertEquals($resultadoEsperado, $resultadoOrdenado);
  }

  public function testOrdenarPorPrato() {
    $registrosCompra = [];
    $pratos = [];
    $tipos = [];
    $cardapio = new Cardapio();
    // create new cliente with nome and cpf
    $cliente = new Cliente("123.456.789-00", "João da Silva");


    // create tipos
    $tipos[0] = new Tipo("Italiana", "Macarrão bolonhesa e Pizza");
    $tipos[1] = new Tipo("Fast-food", "Cheese-burguer, Pastel de carne e Frango frito");
    $tipos[2] = new Tipo("Oriental", "Sashimi e Temaki");

    // create pratos italiana
    $pratos[0] = new Prato("Pizza", $tipos[0], 20.00, "Pizza de calabresa", "Calabresa, queijo, molho de tomate", "pizza.jpg");
    $pratos[1] = new Prato("Macarrão", $tipos[0], 15.00, "Macarrão bolonhesa", "Macarrão, molho de tomate, carne moída", "macarrao.jpg");

    // create pratos fast-food
    $pratos[2] = new Prato("Cheese-burguer", $tipos[1], 10.00, "Cheese-burguer", "Pão, carne, queijo, molho especial", "cheese-burguer.jpg");
    $pratos[3] = new Prato("Pastel de carne", $tipos[1], 15.00, "Pastel de carne", "Massa frita", "pastel.jpg");
    $pratos[4] = new Prato("Frango frito", $tipos[1], 15.00, "Frango frito", "Carne branca no óleo", "frango.jpg");

    // create pratos orientais
    $pratos[5] = new Prato("Sashimi", $tipos[2], 15.00, "Sashimi", "Peixe cru", "sashimi.jpg");
    $pratos[6] = new Prato("Temaki", $tipos[2], 15.00, "Temaki", "Peixe cru enrolado", "temaki.jpg");

    // create new registro with cliente and pratos
    $registrosCompra[0] = new RegistroDeComprasPrato($cliente, $pratos[2], 5);
    $registrosCompra[1] = new RegistroDeComprasPrato($cliente, $pratos[0], 3);
    $registrosCompra[2] = new RegistroDeComprasPrato($cliente, $pratos[3], 2);
    $registrosCompra[3] = new RegistroDeComprasPrato($cliente, $pratos[4], 1);
    $registrosCompra[4] = new RegistroDeComprasPrato($cliente, $pratos[5], 1);
    $registrosCompra[5] = new RegistroDeComprasPrato($cliente, $pratos[1], 1);
    $registrosCompra[6] = new RegistroDeComprasPrato($cliente, $pratos[6], 1);

    $resultadoOrdenado = $cardapio->getCardapioOrdenadoPrato($pratos, $registrosCompra);
    $resultadoEsperado = [
      $pratos[2],
      $pratos[0],
      $pratos[3],
      $pratos[4],
      $pratos[5],
      $pratos[1],
      $pratos[6],
    ];

    $this->assertEquals($resultadoEsperado, $resultadoOrdenado);
  }
}
