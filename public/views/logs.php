<?php include_once '../src/auth.php'; ?>
<?php include_once '../src/logs_sensors.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles & Tailwind -->
  <link rel="stylesheet" href="public/css/tailwind.css" />
  <link rel="stylesheet" href="public/css/styles.css" />
  <title>Histórico - Hotel Inteligente</title>
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
          <h1 class="text-2xl font-semibold whitespace-nowrap">Histórico</h1>
        </div>

        <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
        <div id="divNumber1">
          <h3 class="mt-6 text-xl dark:text-light"><?php echo $title ?></h3>
        </div>
        <?php
        if ($_GET['region'] == 'rooms') {
        ?>
          <div id="divNumber2">
            <select id="number" class="dark:bg-dark dark:text-light" name="number" onchange="OnSelectionChange()">
              <option <?php if ($_GET['number'] == 1) echo "selected"; ?> value="1">1</option>
              <option <?php if ($_GET['number'] == 2) echo "selected"; ?> value="2">2</option>
              <option <?php if ($_GET['number'] == 3) echo "selected"; ?> value="3">3</option>
              <option <?php if ($_GET['number'] == 4) echo "selected"; ?> value="4">4</option>
              <option <?php if ($_GET['number'] == 5) echo "selected"; ?> value="5">5</option>
              <option <?php if ($_GET['number'] == 6) echo "selected"; ?> value="6">6</option>
            </select>
          </div>
        <?php
        }
        ?>

        <div class="flex flex-col mt-6">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-darker">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Data de Atualização
                      </th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Valor
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                    <?php
                    if ($_GET['region'] == 'rooms') {
                      $file = fopen('../api/data/' . $_GET['region'] . '/' . $_GET['number'] . '/' . $_GET['sensor'] . '/log.txt', 'r');
                    } else {
                      $file = fopen('../api/data/' . $_GET['region'] . '/' . $_GET['sensor'] . '/log.txt', 'r');
                    }

                    //Output lines until EOF is reached
                    while (!feof($file)) {
                      $line = fgets($file);
                      if ($line != false) {
                        $values = explode(';', $line);
                        echo "<tr>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap'>" . $values[0] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap'>" . $values[1] . "</td>";
                        echo "</tr>";
                      }
                    }
                    fclose($file);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <?php include 'templates/footer.php' ?>

    </div>
  </div>
  <script src="public/js/script.js"></script>
  <script>
    function OnSelectionChange() {
      var e = document.getElementById("number");
      var number = e.options[e.selectedIndex].value;
      var sensor = "<?php echo $_GET['sensor']; ?>";
      window.location.replace("logs?region=rooms&number=" + number + "&sensor=" + sensor);
    }
  </script>
</body>

</html>