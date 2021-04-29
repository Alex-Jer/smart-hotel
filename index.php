<?php
$users = array(
    array("admin", "admin1"),
    array("regular", "regular1")
);

$login = "none";

if (isset($_POST['username']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ($_POST['username'] == $user[0] && $_POST['password'] == $user[1]) {
            $login = "done";
            echo "Credenciais corretas";
            echo "Username: " . $_POST['username'] . "<br>";
            echo "Password: " . $_POST['password'] . "<br>";
            session_start();
            $_SESSION["username"] = $_POST['username'];
            $_SESSION["password"] = $_POST['password'];
            header("Location: dashboard.php");
        } else {
            $login = "failed";
        }
    }
}

if ($login == "failed") {
    echo "<div id='divError' class='alert alert-danger' role='alert'>O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros. Verifique-as e tente novamente.</div>";
}
?>

<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Hotel Inteligente</title>
</head>

<body>
    <div class="bg-image"></div>

    <div class="container-fluid" id="login-container">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md-3">
                <form action="index.php" method="POST" id="frmLogin">
                    <input type="text" class="form-control" id="inUsername" placeholder="Nome" name="username" required>
                    <input type="password" class="form-control" id="inPassword" placeholder="Password" name="password" required>
                    <input type="submit" class="btn btn-info" id="btnLogin" value="Login">
                </form>
            </div>
            <div class="col-md"></div>
        </div>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>