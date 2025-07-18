<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
        <p class="mt-2 text-sm text-gray-600">Today is {{ now()->format('l, d M Y') }}.</p>
    </x-filament::card>
</x-filament::widget>
