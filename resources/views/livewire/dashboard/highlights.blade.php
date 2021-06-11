<div class="p-4 transition-shadow border rounded-lg shadow-sm dark:border-teal-700 hover:shadow-lg">
    <div class="flex items-start justify-between">
        <div class="flex flex-col space-y-2">
            @foreach ($actuators as $actuator)
                @if ($actuator->region->name === $region && $actuator->name === $actuatorName)
                    <span
                        class="text-gray-400 dark:text-gray-300">{{ $actuator->region->slug . ' - ' . $actuator->slug }}</span>
                    <span class="text-lg font-semibold dark:text-light" wire:poll.1000ms="render">
                        <span class="text-lg font-semibold dark:text-light">
                            @if ($actuator->unit === 'c_o')
                                @if ($actuator->value)
                                    {{ __('Open') }}
                                @else
                                    {{ __('Closed') }}
                                @endif
                            @elseif ($actuator->unit === 'off_on')
                                @if ($actuator->value)
                                    {{ __('ON') }}
                                @else
                                    {{ __('OFF') }}
                                @endif
                            @else
                                {{ $actuator->value . $actuator->unit }}
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
        @foreach ($actuators as $actuator)
            @if ($actuator->region->name === $region && $actuator->name === $actuatorName)
                <span class="inline-block px-2 text-sm text-white bg-green-300 rounded mt-7 dark:text-ocean-500">
                    {{ $actuator->updated_at->format('H:i:s d-m-Y') }}
                </span>
                <livewire:dashboard.toggle-button :actuator="$actuator" value="{{ !$actuator->value }}" field="value"
                    key="{{ $actuator->id }}" />
            @endif
        @endforeach
    </div>
</div>
