<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/tailwind.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <title>Hotel Inteligente</title>
</head>

<body>
  <div class="bg-image-login"></div>
  <form action="index.php" method="post">
    <div class="flex flex-col justify-center min-h-screen sm:py-12">
      <div class="p-10 mx-auto xs:p-0 md:w-full md:max-w-md">
        <div class="w-full bg-white divide-y divide-gray-200 rounded-lg shadow">
          <div class="px-5 py-7">
            <label class="block pb-1 text-sm font-semibold text-gray-600">E-mail</label>
            <input type="text" class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" />
            <label class="block pb-1 text-sm font-semibold text-gray-600">Password</label>
            <input type="text" class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" />
            <button type="button" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
              <span class="inline-block mr-2">Login</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline-block w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>