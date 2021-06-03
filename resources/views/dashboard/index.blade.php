<x-dashboard.master title="Dashboard" :regions="$regions">
    <!-- Sensores -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

        <livewire:dashboard-highlights :sensors="$sensors" region="rooftop" sensorName="solar_battery"
            svg="car-battery" />

        <livewire:dashboard-highlights :sensors="$sensors" region="pool" sensorName="temperature" svg="swimmer" />

        <livewire:dashboard-highlights :sensors="$sensors" region="parking" sensorName="barrier" svg="parking" />

    </div>

    <!-- Tabela de Sensores -->
    <h3 class="mt-6 text-xl dark:text-light">Tabela de Sensores</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 dark:divide-teal-700">
                        <thead class="bg-gray-50 dark:bg-darker">
                            <tr>
                                <th scope="col"
                                    class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Região
                                </th>
                                <th scope="col"
                                    class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Dispositivo
                                </th>
                                <th scope="col"
                                    class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Valor
                                </th>
                                <th scope="col"
                                    class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Data de Atualização
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                            @foreach ($sensors as $sensor)
                                <tr class="transition-all hover:bg-gray-100 dark:hover:bg-dark hover:shadow-lg">
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->region->slug }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->slug }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->value . $sensor->unit }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->updated_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.master>
