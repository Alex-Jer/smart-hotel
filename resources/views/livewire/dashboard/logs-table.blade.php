<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md dark:border-dark">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 dark:divide-teal-700">

                    <thead class="bg-gray-50 dark:bg-darker">
                        <tr>
                            <th scope="col"
                                class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                {{ __('Device') }}
                            </th>
                            <th scope="col"
                                class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                {{ __('Value') }}
                            </th>
                            <th scope="col"
                                class="w-1/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                {{ __('Date') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-darker dark:divide-darker">
                        @foreach ($logs as $log)

                            <tr class="transition-all hover:bg-gray-100 dark:hover:bg-dark hover:shadow-lg">

                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    {{ $log->actuator->slug }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">

                                    @if ($log->actuator->unit === 'c_o')
                                        @if ($log->value)
                                            <span class="px-2 py-px text-green-800 bg-green-200 rounded-full">
                                                {{ __('Open') }}
                                            </span>
                                        @else
                                            <span class="px-2 py-px text-green-800 bg-red-200 rounded-full">
                                                {{ __('Closed') }}
                                            </span>
                                        @endif
                                    @elseif($log->actuator->unit === 'off_on')
                                        @if ($log->value)
                                            <span class="px-2 py-px text-green-800 bg-green-200 rounded-full">
                                                {{ __('ON') }}
                                            </span>
                                        @else
                                            <span class="px-2 py-px text-green-800 bg-red-200 rounded-full">
                                                {{ __('OFF') }}
                                            </span>
                                        @endif
                                    @else
                                        {{ $log->actuator->value . $log->actuator->unit }}
                                    @endif

                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    {{ $log->actuator->created_at->format('H:i:s d-m-Y') }}
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
