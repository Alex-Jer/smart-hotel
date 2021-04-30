<?php
$users = array(
  array("admin", "admin"),
  array("regular", "regular")
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
      header("Location: dashboard");
    } else {
      $login = "failed";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/public/css/tailwind.css" />
  <link rel="stylesheet" href="/public/css/styles.css" />
  <title>Hotel Inteligente</title>
</head>

<body>
  <div class="bg-image-login"></div>
  <form action="" method="post">
    <div class="flex flex-col justify-center min-h-screen sm:py-12">
      <div class="p-10 mx-auto xs:p-0 md:w-full md:max-w-md">
        <?php
        if ($login == "failed") {
          echo "<div id='divAlerta' class='px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded' role='alert'>
          <strong class='font-bold'>Erro!</strong>
          <span class='block sm:inline'>O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros. Verifique-as e tente novamente.</span></div>";
        }
        ?>
        <div class="w-full bg-white divide-y divide-gray-200 rounded-lg shadow">
          <div class="px-5 py-7">
            <label class="block pb-1 text-sm font-semibold text-gray-600">Username</label>
            <input type="text" id="inUsername" class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" name="username" required autofocus />
            <label class="block pb-1 text-sm font-semibold text-gray-600">Password</label>
            <input type="text" id="inPassword" class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" name="password" required />
            <input type="submit" value="Login" class="transition cursor-pointer duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block"></input>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>