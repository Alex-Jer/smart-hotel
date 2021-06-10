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
            <i class="fas fa-5x fa-{{ $svg }}"></i>
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
