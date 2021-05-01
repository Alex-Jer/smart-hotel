<?php

header('Content-Type: text/html; charset=utf-8');
$method_type = $_SERVER['REQUEST_METHOD'];

if ($method_type == 'POST') {
  echo 'recebido um post' . PHP_EOL;
  print_r($_POST);
  if (isset($_POST['nome'])) {
    switch ($_POST['nome']) {
      case 'tempQuarto':
        echo 'Sensor de Temperatura do Quarto';
        if (isset($_POST['numQuarto']) && isset($_POST['valor']) && isset($_POST['hora'])) {
          echo file_put_contents("files/temperatura/valor.txt", "$_POST[valor]");
          echo file_put_contents("files/temperatura/hora.txt", "$_POST[hora]");
          echo file_put_contents("files/temperatura/log.txt", "$_POST[hora]" . ";" . "$_POST[valor]" . PHP_EOL, FILE_APPEND);
        }
        break;
      default:
        echo 'ERRO: O Sensor/Atuador indicado não existe!';
        break;
    }
  } else {
    echo 'ERRO: Parâmetros inválidos';
  }
} elseif ($method_type == 'GET') {
  echo 'recebido um get' . PHP_EOL;
  if (isset($_GET['nome'])) {
    echo file_get_contents("api/{$_GET['nome']}/valor.txt");
  }
} else {
  echo 'ERRO: Método não permitido!';
}
