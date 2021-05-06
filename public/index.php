<?php include_once 'src/login.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/tailwind.min.css" />
  <link rel="stylesheet" href="public/css/styles.min.css" />
  <title>Hotel Inteligente</title>
</head>

<body>
  <div class="bg-image-login"></div>
  <form action="" method="post">
    <div class="flex flex-col justify-center min-h-screen sm:py-12">
      <div class="p-10 mx-auto xs:p-0 md:w-full md:max-w-md">
        <?php if (isset($loginSuccess) && !$loginSuccess) { ?>
          <div id='divAlerta' class='px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded' role='alert'>
            <strong class='font-bold'>Erro!</strong>
            <span class='block sm:inline'>Nome de utilizador e senha inválidos. Verifique-os e tente novamente.</span>
          </div>
        <?php } ?>
        <div class="w-full bg-white divide-y divide-gray-200 rounded-lg shadow">
          <div class="px-5 py-7">
            <label class="block pb-1 text-sm font-semibold text-gray-600">Username</label>
            <input type="text" id="inUsername" class="block w-full px-3 py-2 mt-1 mb-5 text-sm bg-white border-2 border-gray-300 rounded-lg shadow-md focus:bg-white focus:border-gray-600 focus:outline-none" name="username" required autofocus />
            <label class="block pb-1 text-sm font-semibold text-gray-600">Password</label>
            <input type="password" id="inPassword" class="block w-full px-3 py-2 mt-1 mb-10 text-sm bg-white border-2 border-gray-300 rounded-lg shadow-md focus:bg-white focus:border-gray-600 focus:outline-none" name="password" required />
            <input type="submit" value="Login" class="transition cursor-pointer duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block"></input>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>