<?php

header('Content-Type: text/html; charset=utf-8');
$method_type = $_SERVER['REQUEST_METHOD'];

if ($method_type == 'POST') {
  echo 'recebido um post' . PHP_EOL;
  print_r($_POST);
  if (isset($_POST['region'])) {
    switch ($_POST['region']) {
      case 'rooms':
        echo 'Region: Rooms' . PHP_EOL;
        if (isset($_POST['number']) && isset($_POST['sensor']) && isset($_POST['value']) && isset($_POST['time'])) {
          echo file_put_contents("data/rooms/{$_POST['number']}/{$_POST['sensor']}.txt", "$_POST[time]" . ";" . "$_POST[value]");
          echo file_put_contents("data/rooms/{$_POST['number']}/log-{$_POST['sensor']}.txt", "$_POST[time]" . ";" . "$_POST[value]" . PHP_EOL, FILE_APPEND);
        } else {
          echo 'ERRO: Dados em Falta!' . PHP_EOL;
        }
        break;
      case 'pool':
        echo 'Region: Pool' . PHP_EOL;
        if (isset($_POST['value']) && isset($_POST['time'])) {
          echo file_put_contents("data/pool/temperature.txt", "$_POST[time]" . ";" . "$_POST[value]");
          echo file_put_contents("data/pool/log.txt", "$_POST[time]" . ";" . "$_POST[value]" . PHP_EOL, FILE_APPEND);
        } else {
          echo 'ERRO: Dados em Falta!' . PHP_EOL;
        }
        break;
      case 'parking':
        echo 'Region: Parking' . PHP_EOL;
        break;
      case 'rooftop':
        echo 'Region: Rooftop' . PHP_EOL;
        break;
      default:
        echo 'ERRO: A região indicado não existe!' . PHP_EOL;
        break;
    }
  } else {
    echo 'ERRO: Parâmetros inválidos' . PHP_EOL;
  }
} elseif ($method_type == 'GET') {
  echo 'recebido um get' . PHP_EOL;
  if (isset($_GET['nome'])) {
    echo file_get_contents("api/{$_GET['nome']}/valor.txt");
  }
} else {
  echo 'ERRO: Método não permitido!';
}
