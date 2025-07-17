<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-2">Recent Errors</h2>

        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">User</th>
                    <th class="py-2">URL</th>
                    <th class="py-2">IP</th>
                    <th class="py-2">Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($errors as $error)
                    <tr class="border-b">
                        <td class="py-1">{{ $error->user?->name ?? '-' }}</td>
                        <td class="py-1">{{ $error->url ?? '-' }}</td>
                        <td class="py-1">{{ $error->ip_address ?? '-' }}</td>
                        <td class="py-1 text-gray-500">{{ $error->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 text-center text-gray-500">No recent errors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-filament::section>
</x-filament-widgets::widget>
