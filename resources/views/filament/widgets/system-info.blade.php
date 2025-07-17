<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-2">System Information</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div><strong>Site Name:</strong> {{ $siteName }}</div>
            <div><strong>Laravel Version:</strong> {{ $laravelVersion }}</div>
            <div><strong>PHP Version:</strong> {{ $phpVersion }}</div>
            <div><strong>Filament Version:</strong> {{ $filamentVersion }}</div>
            <div><strong>Apache Version:</strong> {{ $apacheVersion }}</div>
            <div><strong>Timezone:</strong> {{ $timezone }}</div>
            <div>
                <strong>Maintenance Mode:</strong>
                @if ($maintenanceMode)
                    <span class="text-red-600 font-semibold">ON</span>
                @else
                    <span class="text-green-600 font-semibold">OFF</span>
                @endif
            </div>
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
