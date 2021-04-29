<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("refresh:5;url=index.php");
  die("Acesso restrito.");
} else {
  $valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
  $hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
  $nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
  echo ($nome_temperatura . ": " . $valor_temperatura . "ºC em " . $hora_temperatura);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="refresh" content="30">
  <title>Plataforma IoT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Dashboard EI-TI</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Histórico</a>
        </li>
      </ul>
      <a href="logout.php">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Logout</button>
      </a>
    </div>
  </nav>

  <div class="jumbotron">
    <h1>Servidor IoT</h1>
    <p>Tecnologias de Internet - Engenharia Informática</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="card text-center">
          <div class="card-header">Luminosidade: 80%</div>
          <div class="card-body"><img src="dia.png"></div>
          <div class="card-footer">Atualização: 2020/03/01 14:31 - <a href="#">Histórico</a></div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card text-center">
          <div class="card-header"><?php echo $nome_temperatura; ?>: <?php echo $valor_temperatura; ?>º</div>
          <div class="card-body"><img src="temperature.png"></div>
          <div class="card-footer">Atualização: <?php echo $hora_temperatura; ?> - <a href="#">Histórico</a></div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card text-center">
          <div class="card-header">Porta: Fechada</div>
          <div class="card-body"><img src="door.png"></div>
          <div class="card-footer">Atualização: 2020/03/01 14:31 - <a href="#">Histórico</a></div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">Tabela de Sensores</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tipo de Dispositivo IoT</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Data de Atualização</th>
                  <th scope="col">Estado Alertas</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Sensor de Luz</td>
                  <td>1000</td>
                  <td>2020/03/01 14:31</td>
                  <td><span class="badge badge-success">Ativo</span></td>
                </tr>
                <tr>
                  <td><?php echo $nome_temperatura; ?></td>
                  <td><?php echo $valor_temperatura; ?>ºC</td>
                  <td><?php echo $hora_temperatura; ?></td>
                  <td><span class="badge badge-danger">Desativo</span></td>
                </tr>
                <tr>
                  <td>Humidade</td>
                  <td>85%</td>
                  <td>2020/03/01 14:31</td>
                  <td><span class="badge badge-warning">Warning</span></td>
                </tr>
                <tr>
                  <td>Luminosidade</td>
                  <td>80%</td>
                  <td>2020/03/01 14:31</td>
                  <td><span class="badge badge-danger">Muito Forte</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>