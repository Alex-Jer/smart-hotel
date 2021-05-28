<?php

use App\Models\Region;
use App\Models\Sensor;

header('Content-Type: text/html; charset=utf-8');
$method_type = $_SERVER['REQUEST_METHOD'];

if ($method_type == 'POST') {
    echo 'recebido um post' . PHP_EOL;
    print_r($_POST);
    if (isset($_POST['region'])) {
        echo "Region: {$_POST['region']}" . PHP_EOL;
        $time = date('d/m/Y H:i:s');
        switch ($_POST['region']) {
            case 'rooms':
                if (isset($_POST['number']) && isset($_POST['sensor']) && isset($_POST['value'])) {
                    if ($_POST['sensor'] != 'door') {
                        echo file_put_contents("data/{$_POST['region']}/{$_POST['number']}/{$_POST['sensor']}/value.txt", $time . ';' .
                            "$_POST[value]");
                    }
                    echo file_put_contents("data/{$_POST['region']}/{$_POST['number']}/{$_POST['sensor']}/log.txt", $time . ';' .
                        "$_POST[value]" . PHP_EOL, FILE_APPEND);
                } else {
                    echo 'ERRO: Dados em Falta!' . PHP_EOL;
                }
                break;
            case 'pool':
            case 'parking':
            case 'rooftop':
                if (isset($_POST['value']) && isset($_POST['sensor'])) {
                    echo file_put_contents("data/{$_POST['region']}/{$_POST['sensor']}/value.txt", $time . ';' . "$_POST[value]");
                    echo file_put_contents(
                        "data/{$_POST['region']}/{$_POST['sensor']}/log.txt",
                        $time . ';' . "$_POST[value]" . PHP_EOL,
                        FILE_APPEND
                    );
                } else {
                    echo 'ERRO: Dados em Falta!' . PHP_EOL;
                }
                break;
            default:
                echo 'ERRO: A região indicada não existe!' . PHP_EOL;
                break;
        }
    } else {
        echo 'ERRO: Parâmetros inválidos' . PHP_EOL;
    }
} elseif ($method_type == 'GET') {
    echo 'recebido um get' . PHP_EOL;
    if (isset($_GET['region']) && $_GET['sensor'] && isset($_GET['type'])) {
        switch ($_GET['region']) {
            case 'room':
                echo 'Region: Room' . PHP_EOL;
                if (isset($_GET['number'])) {
                    // Ex: api?region=rooms&number=1&sensor=temperature&type=log
                    $region = DB::table('regions')
                        ->where('name', $_GET['region'])
                        ->where('number', $_GET['number'])
                        ->first();
                    $sensor = Sensor::where('region_id', $region->id)->firstOrFail();
                    echo $sensor->name;
                } else {
                    echo 'ERRO: Introduza o número do quarto!' . PHP_EOL;
                }
                break;
            case 'pool':
            case 'parking':
            case 'rooftop':
                echo file_get_contents("data/{$_GET['region']}/{$_GET['sensor']}/{$_GET['type']}.txt");
                break;
            default:
                echo 'ERRO: A região indicada não existe!' . PHP_EOL;
                break;
        }
    } else {
        echo 'ERRO: Parâmetros em falta! [region], [sensor] e [type] são obrigatórios!';
    }
} else {
    echo 'ERRO: Método não permitido!';
}
