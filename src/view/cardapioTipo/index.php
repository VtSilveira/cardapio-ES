<html>

<head>
  <link rel="stylesheet" href="../../index.css" type="text/css">
</head>

<body class="container">
  <h1>CARDÁPIO DELICINHAS</h1>

  <a class="change-menu" href="/es-restaurante/src/view/cardapioPrato/index.php">Ir para cardápio de Pratos</a>

  <?php

  include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/controller/pratos.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/controller/registro_de_compras_tipo.php';

  include_once $_SERVER['DOCUMENT_ROOT'] . '/es-restaurante/src/model/cardapio.class.php';

  $pratos = fetchPratos();
  $registros = fetchRegistrosTipo('1');
  $cardapio = new Cardapio();
  $cardapioOrdenado = $cardapio->getCardapioOrdenadoTipo($pratos, $registros);
  ?>

  <div class="cardapio">
    <?php
    // make a simple for (non foreach) that renders the pratos
    if (count($cardapioOrdenado) == 0) {
      echo '<p>Nenhum prato disponível no cardápio!</p>';
    }

    for ($i = 0; $i < count($cardapioOrdenado); $i++) {
      $prato = $cardapioOrdenado[$i];
      $nome = ucfirst($cardapioOrdenado[$i]->getNome());
      $tipo = $cardapioOrdenado[$i]->getTipo()->getNome();
      $preco = $cardapioOrdenado[$i]->getPreco();
      $descricao = ucfirst($cardapioOrdenado[$i]->getDescricao());
      $ingredientes = ucfirst($cardapioOrdenado[$i]->getIngredientes());
      $imagem = $cardapioOrdenado[$i]->getImagem();

    ?>
      <div class="prato-container">
        <span>
          <p class="prato-nome"><?php echo htmlspecialchars($nome) ?></p>
          <p class="prato-preco">R$<?php echo htmlspecialchars($preco) ?></p>

          <p class="tag-tipo"><?php echo htmlspecialchars($tipo) ?></p>
        </span>
        <hr />

        <span class="description">
          <p class="prato-descricao"><?php echo htmlspecialchars($descricao) ?></p>
          <img src="<?php echo ($imagem) ?>" />
        </span>

        <p class="prato-ingredientes"><?php echo htmlspecialchars($ingredientes) ?></p>
      </div>
    <?php } ?>
  </div>

</body>

</html>