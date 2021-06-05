<x-dashboard.master title="Dashboard" :regions="$regions" isRoot="true">

    <!-- Sensores -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

        <livewire:dashboard.highlights :sensors="$sensors" region="rooftop" sensorName="solar_battery" svg="car-battery" />

        <livewire:dashboard.highlights :sensors="$sensors" region="pool" sensorName="temperature" svg="swimmer" />

        <livewire:dashboard.highlights :sensors="$sensors" region="parking" sensorName="barrier" svg="parking" />

    </div>

    <!-- Tabela de Sensores -->
    <h3 class="mt-6 text-xl dark:text-light">Tabela de Sensores</h3>

    <livewire:dashboard.table :sensors="$sensors" isRoot=true />

</x-dashboard.master>
