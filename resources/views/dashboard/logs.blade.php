<x-dashboard.master title="Logs" :regions="$regions">
    <div class="mt-6">
        @if ($region->name == 'room')
            <h3 class="inline text-xl dark:text-light">Sensores -</h3>
            <x-dropdown :regions="$regions" :room="$region" />
        @else
            <h3 class="inline text-xl dark:text-light">Sensores - {{ $region->slug }}</h3>
        @endif
    </div>
    <livewire:dashboard.table :sensors="$sensors" :regions="$regions" />
</x-dashboard.master>
