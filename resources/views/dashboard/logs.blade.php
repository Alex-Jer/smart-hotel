<x-dashboard.master title="Logs - {{ !$region->number ? $region->slug : '' }}" :regions="$regions" :numberedRegion="$region">
    <div class="mt-6">
        <livewire:dashboard.logs-table :devices="$actuators" :regions="$regions" :logs="$logs" />
    </div>
</x-dashboard.master>
