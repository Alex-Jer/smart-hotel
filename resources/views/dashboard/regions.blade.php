<x-dashboard.master title="Actuators and Sensors - {{ !$region->number ? $region->slug : '' }}" :regions="$regions"
    :numberedRegion="$region">

    <div class="mt-6">
        <h3 class="inline text-xl dark:text-light">Actuators</h3>
        <livewire:dashboard.table :devices="$actuators" :regions="$regions" />
    </div>
    <div class="mt-6">
        <h3 class="inline text-xl dark:text-light">Sensors</h3>
        <livewire:dashboard.table :devices="$sensors" :regions="$regions" />
    </div>
</x-dashboard.master>
