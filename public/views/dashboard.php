<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles & Tailwind -->
  <link rel="stylesheet" href="/public/css/tailwind.css" />
  <link rel="stylesheet" href="/public/css/styles.css" />
  <title>Dashboard</title>
</head>

<body>
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white dark:bg-dark" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">

      <!-- Sidebar e Topbar -->
      <?php include '../layout/sidebar.php'; ?>

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <!-- Main content header -->
        <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b dark:border-darker dark:text-light lg:items-center lg:space-y-0 lg:flex-row">
          <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
        </div>

        <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
        <h3 class="mt-6 text-xl dark:text-light">Users</h3>
        <div class="flex flex-col mt-6">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-darker">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Title
                      </th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Status
                      </th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Role
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                    <template x-for="i in 8" :key="i">
                      <tr class="transition-all hover:bg-gray-100 dark:hover:bg-gray-900 hover:shadow-lg">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                              <img class="w-10 h-10 rounded-full" src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4" alt="" />
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900 dark:text-gray-300">Ahmed Kamel</div>
                              <div class="text-sm text-gray-500">ahmed.kamel@example.com</div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900 dark:text-gray-300">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full dark:bg-green-300">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">Admin</td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300">Edit</a>
                        </td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <?php include '../layout/footer.php' ?>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
  <script src="/public/js/sidebar.js"></script>
</body>

</html>