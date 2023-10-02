<?php
// include_once 'prato.class.php';

// include_once 'model/registro_de_compras_tipo.class.php';

class Cardapio {
  private $pratos;

  public function getCardapioOrdenadoTipo($pratos, $registroCompras) {
    if ($pratos == [] || $registroCompras == []) {
      return [];
    }

    #ordena os registros de acordo com o numero de compras
    for ($i = 0; $i < count($registroCompras); $i++) {
      for ($j = $i; $j < count($registroCompras); $j++) {
        if ($registroCompras[$j]->getNumeroCompras() > $registroCompras[$i]->getNumeroCompras()) {
          #salva o registro com maior valor
          $temp = $registroCompras[$j];
          #apaga o registro da sua antiga posicao
          array_splice($registroCompras, $j, 1);
          #adiciona o registro a nova posicao
          array_splice($registroCompras, $i, 0, array($temp));
        }
      }
    }

    #For para pegar os tipos com maiores numeros de compra
    for ($i = 0; $i < count($registroCompras); $i++) {
      $tipo = $registroCompras[$i]->getTipo();

      for ($j = 0; $j < count($pratos); $j++) {
        if ($pratos[$j]->getTipo()->getNome() == $tipo->getNome()) {
          $this->pratos[] = $pratos[$j];
        }
      }
    }

    #for para pegar os tipos que ainda não foram comprados
    for ($i = 0; $i < count($pratos); $i++) {
      $tipo = $pratos[$i]->getTipo();

      $novoTipo = true;
      for ($j = 0; $j < count($this->pratos); $j++) {
        if ($tipo->getNome() == $this->pratos[$j]->getTipo()->getNome()) {
          $novoTipo = false;
        }
      }
      if ($novoTipo == true) {
        for ($j = 0; $j < count($pratos); $j++) {
          if ($pratos[$j]->getTipo()->getNome() == $tipo->getNome()) {
            $this->pratos[] = $pratos[$j];
          }
        }
      }
    }
    return $this->pratos;
  }

  public function getCardapioOrdenadoPrato($pratos, $registroCompras) {
    if ($pratos == [] || $registroCompras == []) {
      return [];
    }

    #ordena os registros de acordo com o numero de compras
    for ($i = 0; $i < count($registroCompras); $i++) {
      for ($j = $i; $j < count($registroCompras); $j++) {
        if ($registroCompras[$j]->getNumeroCompras() > $registroCompras[$i]->getNumeroCompras()) {
          #salva o registro com maior valor
          $temp = $registroCompras[$j];
          #apaga o registro da sua antiga posicao
          array_splice($registroCompras, $j, 1);
          #adiciona o registro a nova posicao
          array_splice($registroCompras, $i, 0, array($temp));
        }
      }
    }

    #For para pegar os pratos na ordem
    for ($i = 0; $i < count($registroCompras); $i++) {
      $pratoEscolhido = $registroCompras[$i]->getPrato();

      for ($j = 0; $j < count($pratos); $j++) {
        if ($pratos[$j]->getNome() == $pratoEscolhido->getNome()) {
          $this->pratos[] = $pratos[$j];
        }
      }
    }

    #for para pegar os pratos que ainda não foram comprados
    for ($i = 0; $i < count($pratos); $i++) {
      $nomePrato = $pratos[$i]->getNome();

      $novoPrato = true;
      for ($j = 0; $j < count($this->pratos); $j++) {
        if ($nomePrato == $this->pratos[$j]->getNome()) {
          $novoPrato = false;
        }
      }
      if ($novoPrato == true) {
        $this->pratos[] = $pratos[$i];
      }
    }
    return $this->pratos;
  }
}
