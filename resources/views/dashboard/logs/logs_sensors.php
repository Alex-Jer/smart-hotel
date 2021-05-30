<?php
switch ($_GET['sensor']) {
  case 'barrier';
    $title = "Barreira";
    break;
  case 'lights';
    $title = "Luzes";
    break;
  case 'temperature';
    $title = "Temperatura";
    break;
  case 'solar_battery';
    $title = "Bateria ";
    break;
  case 'solar_panel';
    $title = "Painel Solar";
    break;
  case 'ac';
    $title = "Ar Condicionado";
    break;
  case 'door';
    $title = "Porta";
    break;
  case 'humidity';
    $title = "Humidade";
    break;
  case 'smoke';
    $title = "Detetor de Fumo";
    break;
}

switch ($_GET['region']) {
  case 'parking';
    $title = $title . " do Parque de Estacionamento";
    break;
  case 'pool';
    $title = $title . " da Piscina";
    break;
  case 'rooftop';
    $title = $title . " do Telhado";
    break;
  case 'rooms';
    $title = $title . " do Quarto ";
    break;
}
