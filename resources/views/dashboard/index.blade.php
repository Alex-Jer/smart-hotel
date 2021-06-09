<x-dashboard.master title="Dashboard" :regions="$regions" isRoot="true">

    <!-- Sensores -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

        <livewire:dashboard.highlights :sensors="$sensors" region="foyer" sensorName="door" svg="door" />

        <livewire:dashboard.highlights :sensors="$sensors" region="garden" sensorName="sprinklers" svg="faucet" />

        <livewire:dashboard.highlights :sensors="$sensors" region="parking" sensorName="barrier" svg="parking" />

    </div>

    <!-- Tabela de Sensores -->
    <h3 class="mt-6 text-xl dark:text-light">Tabela de Sensores</h3>

    <livewire:dashboard.table :sensors="$sensors" isRoot=true />

</x-dashboard.master>
