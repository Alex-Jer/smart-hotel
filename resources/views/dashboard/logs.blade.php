<x-dashboard.master title="Logs" :regions="$regions">
    <h3 class="mt-6 text-xl dark:text-light">Sensores - {{ $region->slug }}</h3>
    <livewire:dashboard.table :sensors="$sensors" :regions="$regions" />
</x-dashboard.master>
