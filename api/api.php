<?php
header('Content-Type: text/html; charset=utf-8');
$method_type = $_SERVER['REQUEST_METHOD'];

if ($method_type == 'POST') {
  echo 'recebido um post' . PHP_EOL;
  print_r($_POST);
  if (isset($_POST['valor']) && isset($_POST['nome']) && isset($_POST['hora'])) {
    switch ($_POST['nome']) {
      case 'temperatura':
        file_put_contents('temperatura/valor.txt', $_POST['valor']);
        file_put_contents('temperatura/hora.txt', $_POST['hora']);
        file_put_contents('temperatura/log.txt', $_POST['hora'] . ';' . $_POST['valor'] . PHP_EOL, FILE_APPEND);
        break;
      case 'humidade':
        file_put_contents('humidade/valor.txt', $_POST['valor']);
        file_put_contents('humidade/hora.txt', $_POST['hora']);
        file_put_contents('humidade/log.txt', $_POST['hora'] . ';' . $_POST['valor'] . PHP_EOL, FILE_APPEND);
        break;
      case 'luminosidade':
        file_put_contents('luminosidade/valor.txt', $_POST['valor']);
        file_put_contents('luminosidade/hora.txt', $_POST['hora']);
        file_put_contents('luminosidade/log.txt', $_POST['hora'] . ';' . $_POST['valor'] . PHP_EOL, FILE_APPEND);
        break;
    }
  } else {
    echo 'ERRO: Parâmetros inválidos';
  }
} elseif ($method_type == 'GET') {
  echo 'recebido um get' . PHP_EOL;
  if (isset($_GET['nome'])) {
    echo file_get_contents("{$_GET['nome']}/valor.txt");
  }
} else {
  echo 'ERRO: Método não permitido!';
}
