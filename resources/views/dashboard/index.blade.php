<x-dashboard.master title="Dashboard">
    <!-- Sensores -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

        <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400 dark:text-gray-300">Bateria Solar</span>
                    @foreach ($sensors as $sensor)
                        @if ($sensor->region->name === 'rooftop' && $sensor->name === 'solar_battery')
                            <span class="text-lg font-semibold dark:text-light">{{ $sensor->value }}%</span>
                        @endif
                    @endforeach
                </div>
                <span class="text-gray-300 dark:text-gray-300">
                    <i class="fas fa-5x fa-car-battery"></i>
                </span>
            </div>
            <div>
                <span class="dark:text-gray-300">Atualizado em</span>
                @foreach ($sensors as $sensor)
                    @if ($sensor->region->name === 'rooftop' && $sensor->name === 'solar_battery')
                        <span
                            class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500">{{ $sensor->updated_at }}</span>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400 dark:text-gray-300">Temperatura Piscina</span>
                    @foreach ($sensors as $sensor)
                        @if ($sensor->region->name === 'pool' && $sensor->name === 'temperature')
                            <span class="text-lg font-semibold dark:text-light">{{ $sensor->value }}ºC</span>
                        @endif
                    @endforeach
                </div>
                <span class="text-gray-300 dark:text-gray-300">
                    <i class="fas fa-5x fa-swimmer"></i>
                </span>
            </div>
            <div>
                <span class="dark:text-gray-300">Atualizado em</span>
                @foreach ($sensors as $sensor)
                    @if ($sensor->region->name === 'pool' && $sensor->name === 'temperature')
                        <span
                            class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500">{{ $sensor->updated_at }}</span>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400 dark:text-gray-400">Cancela Estacionamento</span>
                    @foreach ($sensors as $sensor)
                        @if ($sensor->region->name === 'parking' && $sensor->name === 'barrier')
                            @switch($sensor->value)
                                @case(1)
                                    <span class="text-lg font-semibold dark:text-light">Aberta</span>
                                @break
                                @default
                                    <span class="text-lg font-semibold dark:text-light">Fechada</span>
                            @endswitch
                        @endif
                    @endforeach
                </div>
                <span class="text-gray-300 dark:text-gray-300">
                    <i class="fas fa-5x fa-parking"></i>
                </span>
            </div>
            <div>
                <span class="dark:text-gray-300">Atualizado em</span>
                @foreach ($sensors as $sensor)
                    @if ($sensor->region->name === 'parking' && $sensor->name === 'barrier')
                        <span
                            class="inline-block px-2 text-sm text-white bg-green-300 rounded dark:text-ocean-500">{{ $sensor->updated_at }}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Tabela de Sensores -->
    <h3 class="mt-6 text-xl dark:text-light">Tabela de Sensores</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-darker">
                            <tr>
                                <th scope="col"
                                    class="w-1/3 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Dispositivo
                                </th>
                                <th scope="col"
                                    class="w-1/3 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Valor
                                </th>
                                <th scope="col"
                                    class="w-1/3 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Data de Atualização
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                            @foreach ($sensors as $sensor)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->value }} {{ $sensor->unit }}
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
