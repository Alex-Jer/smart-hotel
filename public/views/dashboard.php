<?php include_once '../src/auth.php'; ?>
<?php include_once '../src/sensors.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Hotel Inteligente</title>
  <!-- Styles & Tailwind -->
  <link rel="stylesheet" href="public/css/tailwind.css" />
  <link rel="stylesheet" href="public/css/styles.css" />
</head>

<body>
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white dark:bg-dark">

      <!-- Sidebar e Topbar -->
      <?php include 'templates/sidebar.php'; ?>

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <!-- Main content header -->
        <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b dark:border-darker dark:text-light lg:items-center lg:space-y-0 lg:flex-row">
          <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
        </div>

        <!-- Sensores -->
        <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

          <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400 dark:text-gray-300">Bateria Solar</span>
                <span class="text-lg font-semibold dark:text-light"><?php echo $rooftop_solarbattery[1] ?>%</span>
              </div>
              <span class="text-gray-300 dark:text-gray-300">
                <i class="fas fa-5x fa-car-battery"></i>
              </span>
            </div>
            <div>
              <span class="dark:text-gray-300">Atualizado em</span>
              <span class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500"><?php echo $rooftop_solarbattery[0] ?></span>
            </div>
          </div>

          <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400 dark:text-gray-300">Temperatura Piscina</span>
                <span class="text-lg font-semibold dark:text-light"><?php echo $pool_temp[1] ?>ºC</span>
              </div>
              <span class="text-gray-300 dark:text-gray-300">
                <i class="fas fa-5x fa-swimmer"></i>
              </span>
            </div>
            <div>
              <span class="dark:text-gray-300">Atualizado em</span>
              <span class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500"><?php echo $pool_temp[0] ?></span>
            </div>
          </div>

          <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400 dark:text-gray-400">Cancela Estacionamento</span>
                <span class="text-lg font-semibold dark:text-light"><?php echo $parking_barrier[1] ?></span>
              </div>
              <span class="text-gray-300 dark:text-gray-300">
                <i class="fas fa-5x fa-parking"></i>
              </span>
            </div>
            <div>
              <span class="dark:text-gray-300">Atualizado em</span>
              <span class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500"><?php echo $parking_barrier[0] ?></span>
            </div>
          </div>
        </div>

      </main <!-- Footer -->
      <?php include 'templates/footer.php' ?>

    </div>
  </div>
  <script src="https://kit.fontawesome.com/6bed2cc76e.js" crossorigin="anonymous"></script>
  <script src="public/js/script.js"></script>
</body>

</html>