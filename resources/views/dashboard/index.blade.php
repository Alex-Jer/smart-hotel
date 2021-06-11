<x-dashboard.master title="Dashboard" :regions="$regions" isRoot="true">

    <!-- Highlighted Actuators -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">

        <livewire:dashboard.highlights :actuators="$actuators" region="foyer" actuatorName="lights" svg="lightbulb" />

        <livewire:dashboard.highlights :actuators="$actuators" region="garden" actuatorName="sprinklers" svg="faucet" />

        <livewire:dashboard.highlights :actuators="$actuators" region="parking" actuatorName="barrier" svg="parking" />

    </div>

    <!-- Actuators Table -->
    <h3 class="mt-6 text-xl dark:text-light">Actuators</h3>
    <livewire:dashboard.table :devices="$actuators" isRoot=true />

    <!-- Sensors Table -->
    <h3 class="mt-6 text-xl dark:text-light">Sensors</h3>
    <livewire:dashboard.table :devices="$sensors" isRoot=true />

</x-dashboard.master>
