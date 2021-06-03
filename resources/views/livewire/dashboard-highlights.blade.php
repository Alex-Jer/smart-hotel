<div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
    <div class="flex items-start justify-between">
        <div class="flex flex-col space-y-2">
            @foreach ($sensors as $sensor)
                @if ($sensor->region->name === $region && $sensor->name === $sensorName)
                    <span
                        class="text-gray-400 dark:text-gray-300">{{ $sensor->region->slug . ' - ' . $sensor->slug }}</span>
                    <span class="text-lg font-semibold dark:text-light" wire:poll.1000ms="render">
                        @if ($sensor->name === 'barrier')
                            @switch($sensor->value)
                                @case(1)
                                    <span class="text-lg font-semibold dark:text-light">Aberta</span>
                                @break
                                @default
                                    <span class="text-lg font-semibold dark:text-light">Fechada</span>
                            @endswitch
                        @else
                            <span
                                class="text-lg font-semibold dark:text-light">{{ $sensor->value . $sensor->unit }}</span>
                        @endif
                    </span>
                @endif
            @endforeach
        </div>
        <span class="text-gray-300 dark:text-gray-300">
            <i class="fas fa-5x fa-{{ $svg }}"></i>
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
