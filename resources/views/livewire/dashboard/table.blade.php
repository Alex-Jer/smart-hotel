<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 dark:divide-teal-700">
                    <thead class="bg-gray-50 dark:bg-darker">
                        <tr>
                            @if ($isRoot)
                                <th scope="col"
                                    class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Região
                                </th>
                            @endif
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
                                Data @if ($isRoot) de Atualização @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                        @foreach ($sensors as $sensor)
                            <tr class="transition-all hover:bg-gray-100 dark:hover:bg-dark hover:shadow-lg">
                                @if ($isRoot)
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $sensor->region->slug }}
                                    </td>
                                @endif
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ $sensor->slug }}
                                </td>


                                @if ($isRoot)
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap"
                                        wire:poll.1000ms="render">
                                    @else
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                @endif
                                @if ($sensor->name === 'barrier')
                                    @if ($sensor->value)
                                        Aberta
                                    @else
                                        Fechada
                                    @endif
                                @else
                                    {{ $sensor->value . $sensor->unit }}
                                @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap" @if ($isRoot) wire:poll.1000ms="render" @endif>
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