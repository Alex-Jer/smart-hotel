<div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
    <div class="flex items-start justify-between">
        <div class="flex flex-col space-y-2">
            @foreach ($sensors as $sensor)
                @if ($sensor->region->name === $region && $sensor->name === $sensorName)
                    <span class="text-gray-400 dark:text-gray-300">{{ $sensor->region->slug . ' - ' . $sensor->slug }}</span>
                    <span class="text-lg font-semibold dark:text-light" wire:poll.1000ms="render">
                        <span class="text-lg font-semibold dark:text-light">
                            @if ($sensor->unit === 'c_o')
                                @if ($sensor->value)
                                    {{ __('Open') }}
                                @else
                                    {{ __('Closed') }}
                                @endif
                            @elseif ($sensor->unit === 'off_on')
                                @if ($sensor->value)
                                    {{ __('ON') }}
                                @else
                                    {{ __('OFF') }}
                                @endif
                            @else
                                {{ $sensor->value . $sensor->unit }}
                            @endif
                        </span>
                    </span>
                @endif
            @endforeach
        </div>
        <span class="mr-0.5 text-gray-300 dark:text-gray-300">
            @if ($svg === 'door')
                <svg class="w-20 h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 950 1700" fill="currentColor">
                    <path
                        d="M140 1c-18 3-31 6-45 13C48 36 15 79 3 133l-3 10v1558h1278V137l-2-10A169 169 0 001154 3l-10-3H643L140 1zm839 748c32 6 61 28 76 57a106 106 0 11-76-57z" />
                </svg>
            @else
                <i class="fas fa-5x fa-{{ $svg }}"></i>
            @endif
        </span>
    </div>
    <div>
        <span class="dark:text-gray-300">{{ __('Updated at') }}</span>
        @foreach ($sensors as $sensor)
            @if ($sensor->region->name === $region && $sensor->name === $sensorName)
                <span class="inline-block px-2 text-sm text-white bg-green-300 rounded mt-7 dark:text-ocean-500">
                    {{ $sensor->updated_at->format('H:i:s d-m-Y') }}
                </span>
                <livewire:dashboard.toggle-button :sensor="$sensor" value="{{ !$sensor->value }}" field="value"
                    key="{{ $sensor->id }}" />
            @endif
        @endforeach
    </div>
</div>
