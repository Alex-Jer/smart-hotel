<x-dashboard.master title="Logs" :regions="$regions">
    <h3 class="mt-6 text-xl dark:text-light">Sensores - {{ $region->slug }}</h3>
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
                            @foreach ($logs as $log)
                                @foreach ($sensors as $sensor)
                                    @if ($sensor->id === $log->sensor_id)
                                        <tr>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                {{ $sensor->slug }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                {{ $log->value . $sensor->unit }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                {{ $log->created_at }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.master>
