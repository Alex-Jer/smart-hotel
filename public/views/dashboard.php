<?php include_once '../src/auth.php'; ?>

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

      </main <!-- Footer -->
      <?php include 'templates/footer.php' ?>

    </div>
  </div>
  <script src="public/js/script.js"></script>
</body>

</html>